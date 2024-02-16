<?php
require_once __DIR__ . '/Repository.php';

class UserRepository extends Repository {
    public function addUser(string $userName, string $gameName): bool
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO User (userName, gameName) VALUES (:userName, :gameName)");
            $stmt->bindValue(":userName", $userName);
            $stmt->bindValue(":gameName", $gameName);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function findUserByUsername($username) {
        $query = "SELECT * FROM User WHERE gameName = :username";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function findPoppetByUsername($username) {
        $query = "SELECT * FROM User WHERE gameName = :username";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserInfo($userID)
    {
        // Query to fetch user information based on user ID
        $query = "SELECT * FROM User WHERE userID = :userID";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserProperties($userID)
    {
        // Query to fetch properties owned by the user
        $query = "SELECT * FROM Properties WHERE userID = :userID";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
