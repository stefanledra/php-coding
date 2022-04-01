<?php

class dbConn
{
    private static $connection;
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;
    private string $dsn;

    public function connect($config)
    {
        $this->host     = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbname   = $config['dbName'];
        $this->dsn      = 'mysql:host='.$this->host.';dbname='.$this->dbname;

        try {
            $connection       = new PDO($this->dsn, $this->username, $this->password);
            self::$connection = $connection;

            return self::$connection;
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }

    public function getData($passedString)
    {
        $stmt = self::$connection->prepare('SELECT * FROM hash_history where hashed_string = ? or initial_word = ?');
        $stmt->execute([$passedString, $passedString]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( ! $row) {
            return $passedString;
        } else {
            return $row;
        }
    }

    public function inputData($passedString, $initialWord)
    {
        $query = 'INSERT INTO 
                      hash_history(hashed_string, initial_word) 
                      values(? , ?)';
        $stmt  = self::$connection->prepare($query);
        $stmt->execute([$passedString, $initialWord]);
    }
}