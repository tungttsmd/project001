<?php
class TableStructure extends DBCRUD
{
    private $tableName;

    protected function __construct(string $tableName)
    {
        parent::__construct();
        $this->tableName = $tableName;
    }
    protected function ts()
    {
        # return fetch all columns of table
        $sql = "DESCRIBE `$this->tableName`";
        return $this->prep($sql)->exec()['data']['query_data_fetch'];
    }
    protected function tscount()
    {
        # return column count of table
        return count($this->ts());
    }
    protected function tscolumns()
    {
        # return all column name of table
        return array_map(function ($value) {
            return $value['Field'];
        }, $this->ts());
    }
}
