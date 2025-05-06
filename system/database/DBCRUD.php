<?php
class DBCRUD extends DBStatement
{
    function __construct()
    {
        parent::__construct();
    }

    # CRUD on them
    function create(string $table, array $column, array $value)
    {
        try {
            $sql = "INSERT INTO ?t (?c) VALUE (?v)";

            # executive
            $this->prep($sql);
            $this->bind([$table], '?t');
            $this->bind($column, '?c');
            $this->bind($value, '?v');
            return $this->exec()['data']['insert_id'];
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "] - CRUD thất bại: " . $e->getMessage());
        }
    }
    function delete(string $table, array $where)
    {
        try {
            $sql = "DELETE FROM ?t WHERE (?w)";

            # executive
            $this->prep($sql);
            $this->bind([$table], '?t');
            $this->bind($where, '?w');
            return $this->exec()['data']['affected_rows'];
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "] - CRUD thất bại: " . $e->getMessage());
        }
    }
    function read(string $table, array $column, array $where, int $limit = 0)
    {
        #
        try {
            $sql = "SELECT ?c FROM ?t WHERE ?w";

            # add limit
            $sql .= $limit !== 0 ? " LIMIT $limit" : "";

            # executive
            $this->prep($sql);
            $this->bind([$table], '?t');
            $this->bind($column, '?c');
            $this->bind($where, '?w');
            return $this->exec()['data']['query_data_fetch'];
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "] - CRUD thất bại: " . $e->getMessage());
        }
    }
    function update(string $table, array $data, array $where)
    {
        try {
            $sql = "UPDATE ?t SET ?d WHERE ?w";

            # executive
            $this->prep($sql);
            $this->bind([$table], '?t');
            $this->bind($data, '?d');
            $this->bind($where, '?w');
            return $this->exec()['data']['affected_rows'];
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "] - CRUD thất bại: " . $e->getMessage());
        }
    }
}
