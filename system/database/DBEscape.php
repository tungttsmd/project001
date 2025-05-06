<?php
class DBEscape extends DBQuery
{
    /*** from a long time ago, is_null, is_bool is_numberic is_string are a group of powerfull fantasic single input validators ***/
    /*** if validating array is not easy, try first with empty(array) bro ***/
    private $db;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->dbc();
    }
    # escape single inputs
    protected function valueEscape($value)
    {
        # Use to convert an input value into a valid SQL query statement value
        # Use to prevent executing injection SQL statement by insert '\' among weird characters belike \' \0 \\...
        # List output $value = ['NULL', 1, 0, (numbers), (string)]
        try {
            if (is_null($value)) {
                return 'NULL';
            } elseif (is_bool($value)) {
                return $value ? 1 : 0;
            } elseif (is_int($value) || is_float($value)) {
                return  $value;
            } else {
                # If $value is string, will be given back the value belike 'value' (which inside a pair of single quote '...') 
                return "'" . mysqli_real_escape_string($this->db, $value) . "'";
            }
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Escape ?v thất bại: " . $e->getMessage());
        }
    }
    protected function nameEscape(string $name)
    {
        # Use to valid a input table name or column name into a valid SQL query statement name 
        # Insert backtick (`) for name, will be more safe in SQL statement 
        # Validated character acceptable list = [(alphabet), (numbers), (underscore)]
        if (preg_match('/^[a-zA-Z0-9_]+$/', $name)) {
            return "`" . $name . "`";
        } else {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - $name không hợp lệ. ?t hoặc ?c chỉ bao gồm chữ cái, số và dấu gạch dưới (underscore).");
        }
    }

    # escape multiple inputs
    protected function valueEscapeList(array $valueList)
    {
        try {
            return array_map([$this, 'valueEscape'], array_values($valueList));
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Escape list value (?v) không thành công: " . $e->getMessage());
        }
    }
    protected function nameEscapeList(array $nameList)
    {
        try {
            return array_map([$this, 'nameEscape'],  array_values($nameList));
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Escape list name (?t, ?c) không thành công: " . $e->getMessage());
        }
    }

    # escape combine array [$name => $value] with $name is column name
    protected function arrayEscape(array $arrayEscape)
    {
        try {
            # try catch & empty array is the king!
            if (empty($arrayEscape)) {
                return [];
            }
            return array_combine(
                array_map([$this, 'nameEscape'], array_keys($arrayEscape)),
                array_map([$this, 'valueEscape'], array_values($arrayEscape))
            );
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Escape list where (?w) không thành công: " . $e->getMessage());
        }
    }
}
