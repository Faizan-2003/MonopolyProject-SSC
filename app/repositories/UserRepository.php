<?php
require_once __DIR__ . '/Repository.php';
require_once __DIR__ . '/PropertiesRepository.php';

class UserRepository extends Repository {
    private $propertiesRepository;

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
    public function getActivePlayerIDs() {
        // Query to fetch IDs of all active players from the database
        $query = "SELECT userID FROM User WHERE userID NOT IN (1, 96)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        // Fetch all active player IDs
        $activePlayerIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $activePlayerIDs;
    }
    function getNextPlayerID($currentPlayerID)
    {
        // Prepare the SQL query
        $query = "SELECT userID FROM User WHERE userID > :currentPlayerID AND userID NOT IN (1, 96) ORDER BY userID ASC LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':currentPlayerID', $currentPlayerID, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['userID'];
        } else {
            // If no next player is found, wrap around to the first player after 96
            $query = "SELECT userID FROM User WHERE userID NOT IN (1, 96) ORDER BY userID ASC LIMIT 1";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['userID'];
        }
    }
    public function getAllUsers() {
        $query = "SELECT userID, userName, balanceAmount, gameName, properties 
              FROM User
              WHERE gameName NOT IN ('Boat', 'Marker')";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUserBalance($userId, $newBalance) {
        $query = "UPDATE User SET balanceAmount = :newBalance WHERE userID = :userId";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':newBalance', $newBalance);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }
    public function deleteUser($userID) {
        $query = "DELETE FROM User WHERE userID = :userID";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['userID' => $userID]);
    }

}
?>
