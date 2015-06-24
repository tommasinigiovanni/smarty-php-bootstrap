<?php
/**
* DB class
*/

class DB 
{
    public static $conn = null;

    static function init(array $config)
    {
        DB::$conn = new PDO(
            $config['db']['driver'] . ':host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], 
            $config['db']['user'], $config['db']['password']
        );
    }

    /**
     * Execute query 
     */ 
    static function execute($query, array $values = null)
    {
        $res = DB::$conn->prepare($query);
        $res->execute($values);

        return $res;
    }
}