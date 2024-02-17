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
}
?>
