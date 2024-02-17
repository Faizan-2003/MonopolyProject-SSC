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


    public function buyProperty($userID, $propertyID)
    {
        // Query to update the owner of the property
        $query = "UPDATE Properties SET userID = ? WHERE propertyID = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $userID);
        $stmt->bindParam(2, $propertyID);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function sellProperty($propertyID)
    {
        // Query to update the owner of the property
        $query = "UPDATE Properties SET userID = NULL WHERE propertyID = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $propertyID);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }


}
?>
