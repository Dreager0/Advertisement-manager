<?php
/**
 * The User class handles operations related to users, such as creating and showing users.
 */

require_once 'DB.php';

class User extends DB
{
    /**
     * Creates a new user in the database.
     *
     * @param string $name The name of the user to create.
     * @return bool True on success, false on failure.
     */
    public function createUser($name)
    {
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

    /**
     * Gets all users from the database.
     *
     * @return array An array of all users.
     */
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Shows all users by calling the getUsers method.
     *
     * @return array An array of all users.
     */
    public function showUsers()
    {
        return $this->getUsers();
    }
}
