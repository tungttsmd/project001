<?php
class DBStatement extends DBEscape
{
    private $stmt;
    private $bindingCount;
    function __construct()
    {
        parent::__construct();
        $this->stmt = '';
    }
    # Process prep -> bind -> exec
    protected function prep(string $stmt)
    {
        # chain allow
        $this->stmt = $stmt;
        return $this;
    }
    protected function bind(array $bindValues, string $bindType)
    {
        # get bind type ['?t', '?c', '?v', '?w', '?d'] ~ table, column, value & where
        if (!in_array($bindType, ['?t', '?c', '?v', '?w', '?d'])) {
            throw new Exception("Argument [" . __CLASS__ . "->" . __FUNCTION__ . "()] - \$bindType' phải là ?t, ?c, ?v, ?w hoặc ?d");
        }
        try {
            # escape data
            if ($bindType === '?c' || $bindType === '?t') {
                $bindValues = $this->nameEscapeList($bindValues);
            } elseif ($bindType === '?v') {
                $bindValues = $this->valueEscapeList($bindValues);
            } else {
                $bindValues = $this->arrayEscape($bindValues);
            }

            # convert into sql bind string
            if ($bindType === '?w') {
                $bindString = $this->bindStringWhere($bindValues);
            } elseif ($bindType === '?d') {
                $bindString = $this->bindStringData($bindValues);
            } else {
                $bindString = implode(', ', $bindValues);
            }

            # bind into stmt
            $this->stmt = str_replace($bindType, $bindString, $this->stmt);

            # chain allow
            return $this;
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Bind SQL statement không thành công: " . $e->getMessage());
        }
    }
    protected function exec()
    {
        return $this->fetch($this->stmt);
    }

    # debug
    public function getStmt()
    {
        return $this->stmt;
    }

    # shorten functions
    protected function bindStringWhere(array $bindValues)
    {
        try {
            # Get where sql string (support: null, true/false, int/float and escaped string)
            $bindString = '';
            $condition = '';
            foreach ($bindValues as $column => $value) {
                if ($value === "NULL") {
                    $condition = "$column IS NULL";
                } elseif ($value === 0 || $value === 1) {
                    $condition = "$column = " . ($value ? "TRUE" : "FALSE");
                } elseif (is_int($value) || is_float($value)) {
                    $condition = "$column = $value";
                } else {
                    # Default  is string
                    $condition = "$column = $value";
                }
                $bindString .= " AND $condition";
            }
            return "1 = 1" . $bindString;
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Chuyển đổi list WHERE thành bindString không thành công: " . $e->getMessage());
        }
    }
    protected function bindStringData(array $bindValues)
    {
        try {
            # Bind data sql string
            $bindList = [];
            foreach ($bindValues as $column => $value) {
                $bindList[] = "$column = $value";
            }
            return implode(', ', $bindList);
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Chuyển đổi list data thành bindString không thành công: " . $e->getMessage());
        }
    }
}
