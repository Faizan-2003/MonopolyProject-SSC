<?php
require_once __DIR__ . '/../repositories/PropertiesRepository.php';

// Check if propertyId is provided in the request
if(isset($_GET['propertyId'])) {
    $propertyId = $_GET['propertyId'];

    // Create an instance of the PropertiesRepository class
    $propertiesRepository = new PropertiesRepository();

    // Call the getPropertyDetails method to fetch property details
    $propertyDetails = $propertiesRepository->getPropertyDetails($propertyId);

    // Check if property details are fetched successfully
    if($propertyDetails) {
        // Prepare response data
        $responseData = [
            'success' => true,
            'propertyDetails' => $propertyDetails
        ];
    } else {
        // Property details not found
        $responseData = [
            'success' => false,
            'message' => 'Property details not found'
        ];
    }
} else {
    // propertyId parameter is missing
    $responseData = [
        'success' => false,
        'message' => 'Property ID is missing'
    ];
}

// Set response headers
header('Content-Type: application/json');

// Output JSON response
echo json_encode($responseData);
?>
