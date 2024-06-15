<?php

/**
 * The DB class provides a connection to the database.
 */
class DB
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "advertisements";

    /**
     * Establishes a connection to the database using PDO.
     *
     * @return PDO|null The PDO connection object on success, or null on failure.
     */
    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        try {
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }
    }
}
