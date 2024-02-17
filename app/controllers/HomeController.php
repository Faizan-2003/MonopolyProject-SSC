<?php
require_once __DIR__ . '/../logic/LogInandOut.php'; // Include the file containing getLoggedUser function

class HomeController {
    private $userService;
    private $PropertiesService;

    public function __construct(UserService $userService, PropertiesService $PropertiesService) {
        $this->userService = $userService;
        $this->PropertiesService = $PropertiesService;
    }

    public function displayHomePage(): void {
        session_start(); // Start the session if it's not already started

        // Get logged-in user from session
        $loggedUser = getLoggedUser();

        // Check if a user is logged in
        if (!$loggedUser) {
            echo "User not logged in. Please go back to the login page.";
            return;
        }

        // Retrieve user ID from the logged-in user object
        $userID = $loggedUser->getUserID();

        // Fetch user information from the database using the user ID
        $user = $this->userService->getUserInfo($userID);
        if (!$user) {
            echo "User not found.";
            return;
        }

        // Fetch properties owned by the user from the database
        $properties = $this->userService->getUserProperties($userID);
        $additionalproperties = $this->PropertiesService->getAllProperties();

        // Pass user data and properties to the view
        require_once __DIR__ . "/../Views/home.php";
    }

}
?>
