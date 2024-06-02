<?php
require_once __DIR__ . '/Repository.php';

class PropertiesRepository extends Repository {
    function getPropertyDetails($propertyId) {
        // Perform a database query to fetch property details by property ID
        // Adjust the query to select the necessary fields including fines for different scenarios
        $query = "SELECT propertyName, userID, propertyRent, oneHouse, twoHouse, threeHouse, fourHouses, hotelRent, mortgageValue, buildingCost
                  FROM Properties
                  WHERE propertyID = :propertyId";
        $statement = $this->connection->prepare($query);
        $statement->execute(['propertyId' => $propertyId]);

        // Fetch the property details from the database
        $propertyDetails = $statement->fetch(PDO::FETCH_ASSOC);

        // Return the property details
        return $propertyDetails;
    }
    public function getAllProperties() {
        $query = "SELECT p.propertyName, p.propertyPrice, u.userName AS OwnerName 
              FROM Properties p
              LEFT JOIN User u ON p.userID = u.userID";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPropertyById($propertyId) {
        // Perform a database query to fetch property details by property ID
        $query = "SELECT propertyName, userID         FROM Properties
                  WHERE propertyID = :propertyID";
        $statement = $this->connection->prepare($query);
        $statement->execute(['propertyID' => $propertyId]);

        // Fetch the property details from the database
        $propertyDetails = $statement->fetch(PDO::FETCH_ASSOC);

        // Return the property details
        return $propertyDetails;
    }

    public function removePropertyFromAllUsers($propertyId) {
        $query = "UPDATE Properties SET userID = NULL WHERE propertyID = :propertyId";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['propertyId' => $propertyId]);
    }

    public function assignPropertyToUser($userId, $propertyId) {
        $query = "UPDATE Properties SET userID = :userID WHERE propertyID = :propertyID";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute(['userID' => $userId, 'propertyID' => $propertyId]);
    }

    public function getproperties() {
        $query = "SELECT * FROM Properties";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
