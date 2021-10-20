<?php

require_once("config.php");

class DB
{
    private $connection;
    private $query;
    private $sql;

    /**
     * DB __construct
     */
    public function __construct()
    {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }



    /**
     * Summary of select
     * @param string $table
     * @param string $column
     * @return DB
     */
    public function select(string $table, string $column = '*')
    {
        $this->sql = "SELECT $column FROM `$table`";
        return $this;
    }


    /**
     * Summary of where
     * @param string $column
     * @param string $compar
     * @param mixed $value
     * @return DB
     */
    public function where(string $column, string $compar, string|int $value)
    {
        $this->sql .=" WHERE `$column` $compar '$value'";
        return $this;
    }

    public function and(string $column, string $compar, string|int $value)
    {
        $this->sql .=" AND `$column` $compar '$value'";
        return $this;
    }

    public function or(string $column, string $compar, string|int $value)
    {
        $this->sql .=" OR `$column` $compar '$value'";
        return $this;
    }


    /**
     * Summary of all
     * @return array
     */
    public function all()
    {
        $this->query = mysqli_query($this->connection, $this->sql);
        while($row = mysqli_fetch_assoc($this->query)){
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Summary of row
     * @return array|bool|null
     */
    public function row()
    {
        // $this->query = mysqli_query($this->connection, $this->sql);
        $this->query = $this->connection->query($this->sql);
        $row = mysqli_fetch_assoc($this->query);
        return $row;
    }

    /**
     * Summary of prepare_data
     * @param mixed $data
     * @return string
     */
    private function prepare_data($data)
    {
        if(gettype($data) == "string")
        {
            return "'$data' ,";
        }
        return $data . " ,";
    }

    /**
     * Summary of specialQuery
     * @param array $data
     * @return string
     */
    private function specialQuery(array $data)
    {
        $row = '';
        foreach($data as $key => $value)
        {
            $row .= "`$key` = ". $this->prepare_data($value) ;
        }
        return $row = rtrim($row, ",");
    }

    /**
     * Summary of insert
     * @param string $table
     * @param array $values
     * @return DB
     */
    public function insert(string $table, array $data)
    {
        $this->sql = "INSERT INTO `$table` SET ". $this->specialQuery($data);
        return $this;
    }

    
    /**
     * Summary of update
     * @param string $table
     * @param array $data
     * @return DB
     */
    public function update(string $table, array $data)
    {
        $this->sql = "UPDATE `$table` SET " . $this->specialQuery($data);
        return $this;
    }

    /**
     * Summary of delete
     * @param string $table
     * @return DB
     */
    public function delete(string $table)
    {
        $this->sql = "DELETE FROM `$table`";
        return $this;
    }

    /**
     * Summary of execute
     * @return bool
     */
    public function execute()
    {
        $this->query = $this->connection->query($this->sql);
        if(mysqli_affected_rows($this->connection) > 0)
        {
            return true;
        }
        return false;
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}