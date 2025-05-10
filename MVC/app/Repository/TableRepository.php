<?php
class TableRepository extends DBCRUD
{
    private $tableName;
    public function __construct(string $tableName)
    {
        parent::__construct();
        $this->tableName = $tableName;
    }
    public function all()
    {
        $sql = "SELECT * FROM `$this->tableName`";
        return $this->prep($sql)->exec()['data']['query_data_fetch'];
    }
    public function condition(array $where)
    {
        $sql = "SELECT * FROM `$this->tableName` WHERE ?w";
        return $this->prep($sql)
            ->bind($where, '?w')
            ->exec()['data']['query_data_fetch'];
    }
    public function getById(int $id)
    {
        $sql = "SELECT * FROM `$this->tableName` WHERE `id` = $id LIMIT 1";
        return $this->prep($sql)
            ->exec()['data']['query_data_fetch'];
    }
    public function putById(int $id, array $data)
    {
        return $this->update($this->tableName, $data, ['id' => $id]);
    }
    public function belike($keyword, $belikeColumn)
    {
        $sql = "SELECT * FROM `$this->tableName` WHERE `$belikeColumn` LIKE ?v";
        return $this->prep($sql)
            ->bind(['%' . $keyword . '%'], '?v')
            ->exec()['data']['query_data_fetch'];
    }
}
