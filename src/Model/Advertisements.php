<?php

require_once 'DB.php';

class Advertisements extends DB
{
    public function createAdvertisement($id, $title)
    {
        if ($id != "" && $title != "") {
            $sql = 'INSERT INTO advertisements (userid, title)  VALUES (:id, :title)';
            $pdo = $this->connect();
            if ($pdo) {
                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                    $stmt->execute();
                    return true;
                } catch (PDOException $e) {
                    return false;
                }
            }
        }
        return false;
    }
    public function getAdvertisements(){
        $sql = "SELECT * FROM advertisements";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function showAdvertisements() {
        // Assuming you have a PDO connection stored in $this->conn
        $sql = "SELECT advertisements.title, users.name 
                FROM advertisements 
                JOIN users ON advertisements.userid = users.id";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}