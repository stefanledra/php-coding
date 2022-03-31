<?php

class Dbh
{
    private static $connection = null;
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;
    private string $dsn;

    protected function connect()
    {
        $this->host     = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname   = 'hashing';
        $this->dsn      = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        try {
            $connection       = new PDO($this->dsn, $this->username, $this->password);
            self::$connection = $connection;

            return self::$connection;
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }
}