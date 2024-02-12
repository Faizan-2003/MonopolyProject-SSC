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

    public function findPoppetByUsername($username) {
        $query = "SELECT * FROM User WHERE gameName = :username";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getHashedPasswordById(int $userId): ?string {
        try {
            $query = "SELECT password FROM User WHERE id = :userId";
            $statement = $this->connection->prepare($query);
            $statement->bindValue(':userId', $userId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['password'] : null;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
}
?>
