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
}
?>
