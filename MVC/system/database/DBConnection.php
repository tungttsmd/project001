<?php
class DBConnection
{
    /*** on infrastucture layers, try catch throw Exception is the king ****/
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $dbc;

    function __construct()
    {
        # connection preparing
        $this->db_host = DB_HOST;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASS;
        $this->db_name = DB_NAME;

        # turn off fail silent from < php 4.x (try catch strict mode)
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        # connecting
        try {
            $this->dbc = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            throw new Exception("Exception [" . __CLASS__ . "] - Kết nối database thất bại: " . $e->getMessage());
        }
    }
    protected function dbc()
    {
        # database connection
        return $this->dbc;
    }
}
