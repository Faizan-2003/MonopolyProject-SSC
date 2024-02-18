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
        session_start();
        $loggedUser = getLoggedUser();

        if (!$loggedUser) {
            echo "User not logged in. Please go back to the login page.";
            return;
        }

        $userID = $loggedUser->getUserID();

        $user = $this->userService->getUserInfo($userID);
        if (!$user) {
            echo "User not found.";
            return;
        }

        $properties = $this->userService->getUserProperties($userID);
        $additionalproperties = $this->PropertiesService->getAllProperties();

        require_once __DIR__ . "/../Views/home.php";
    }
}
?>
