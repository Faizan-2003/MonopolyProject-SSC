<?php
require_once __DIR__ . '/../services/UserService.php';

// Include necessary dependencies and classes

// Define a route to handle finishing the turn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finish_turn'])) {
    $UserRepository = new UserRepository();
    $userService = new UserService($UserRepository); // Assuming UserService is instantiated here

    // Check if $currentPlayerID is set in the session
    $currentPlayerID = isset($_SESSION['currentPlayerID']) ? $_SESSION['currentPlayerID'] : 99;

    // Call a method to update the current player ID and move to the next player
    $nextPlayerID = $userService->getNextPlayerID($currentPlayerID);
    $_SESSION['currentPlayerID'] = $nextPlayerID;

    // Send a JSON response indicating success
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
}
?>
