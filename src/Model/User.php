<?php

require_once 'DB.php';

class User extends DB {
    public function createUser($name) {
        $sql = 'INSERT INTO users (name) VALUES (:name)';
        $pdo = $this->connect();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        return false;
    }
    public function getUsers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function showUsers(){
        $users = $this->getUsers();
        return $users;
    }
}