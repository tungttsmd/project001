<?php
class Record
{
    private $fields;
    public function __construct($fields)
    {
        $this->fields = $fields;
    }
    # review
    public function all()
    {
        return $this->fields;
    }

    # get/set accessable
    private function get($key)
    {
        return $this->fields[$key] ?? null;
    }
    private function set(string|int $key, $value)
    {
        $this->fields[$key] = $value;
    }

    # access stdClass style
    public function __get(string|int $key)
    {
        # belike $this->$key
        return $this->get($key);
    }

    public function __set(string|int $key, $value)
    {
        # belike $this->$key = $value
        $this->set($key, $value);
    }
}
