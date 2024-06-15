<?php
/**
 * The Advertisements class handles operations related to advertisements, such as creating and showing advertisements.
 */

require_once 'DB.php';

class Advertisements extends DB
{
    /**
     * Creates a new advertisement in the database.
     *
     * @param int $id The ID of the user creating the advertisement.
     * @param string $title The title of the advertisement.
     * @return bool True on success, false on failure.
     */
    public function createAdvertisement($id, $title)
    {
        if ($id != "" && $title != "") {
            $sql = 'INSERT INTO advertisements (userid, title) VALUES (:id, :title)';
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

    /**
     * Shows all advertisements along with the names of the users who created them.
     *
     * @return array An array of advertisements with usernames.
     */
    public function showAdvertisements()
    {
        $sql = "SELECT advertisements.title, users.name 
                FROM advertisements 
                JOIN users ON advertisements.userid = users.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
