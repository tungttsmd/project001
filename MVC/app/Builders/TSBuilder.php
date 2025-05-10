<?php
class TSBuilder extends TableStructure
{
    private $fields;
    public function __construct(string $tableName)
    {
        parent::__construct($tableName);
        $this->keyConvertInit();
    }

    # init
    public function keyConvertInit()
    {
        foreach ($this->columns() as $value) {
            $this->fields[$value] = null;
        };
    }

    # methods
    public function all()
    {
        return $this->fields;
    }
    public function set(string|int $key, $value)
    {
        $this->fields[$key] = $value;
        return $this;
    }
    public function build()
    {
        return new Record($this->all());
    }
}
