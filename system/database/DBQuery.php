<?php
class DBQuery extends DBConnection
{
    private $db;
    private $query;
    function __construct()
    {
        parent::__construct();
        $this->db = $this->dbc();
    }
    # shorten functions
    protected function query($stmt)
    {
        # database query
        try {
            return mysqli_query($this->db, $stmt);
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "()] - Query thất bại: " . $e->getMessage());
        }
    }

    # fetch functions
    protected function fetch(string $stmt)
    {
        try {
            # query
            $result = $this->query($stmt);

            # fetch data
            if ($result instanceof mysqli_result) {
                $fetchData = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $numRows = mysqli_num_rows($result); # count rows fetched
            } else {
                $fetchData = [];
                $numRows = 0;
            }

            # get data
            $affectedRows = mysqli_affected_rows($this->db);
            $insertId = mysqli_insert_id($this->db);

            # multi-purpose response
            return [
                'data' => [
                    'insert_id' => $insertId,
                    'query_data_fetch' => $fetchData,
                    'query_row_count' => $numRows,
                    'affected_rows' => $affectedRows,
                ],
                'input_output' => [
                    'statement' => $stmt,
                    'result' => $result,
                ],
                'note' => [
                    'insert' => 'Check data "insert_id"',
                    'select' => 'Check data "query_data_fetch" and "query_row_count"',
                    'update' => 'Check data "affected_rows"',
                    'delete' => 'Check data "affected_rows"',
                ]
            ];
        } catch (Exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "->" . __FUNCTION__ . "] - Lỗi fetch dữ liệu: " . $e->getMessage());
        }
    }
}
