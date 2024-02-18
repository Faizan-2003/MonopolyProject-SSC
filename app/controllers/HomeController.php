<?php
require_once __DIR__ . '/../logic/LogInandOut.php'; // Include the file containing getLoggedUser function
require_once __DIR__ . '/../services/UserService.php';

class HomeController {
    private $userService;
    private $propertiesService;

    public function __construct(UserService $userService, PropertiesService $propertiesService) {
        $this->userService = $userService;
        $this->propertiesService = $propertiesService;
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
        $additionalproperties = $this->propertiesService->getAllProperties();
        $activePlayerIDs = $this->userService->getActivePlayerIDs();

        // Get the current player ID
        $currentPlayerID = $this->getCurrentPlayerID($activePlayerIDs);

        require_once __DIR__ . "/../Views/home.php";
    }

    public function getCurrentPlayerID($activePlayerIDs) {
        // Check if the current player ID is stored in the session
        if (isset($_SESSION['currentPlayerID'])) {
            $currentPlayerID = $_SESSION['currentPlayerID'];
        } else {
            // Set initial player ID to the first player in the list if not set in the session
            $currentPlayerID = reset($activePlayerIDs);
            $_SESSION['currentPlayerID'] = $currentPlayerID;
        }

        // Find the index of the current player ID in the array
        $currentIndex = array_search($currentPlayerID, $activePlayerIDs);

        // Calculate the index of the next player ID
        $nextPlayerIndex = ($currentIndex + 1) % count($activePlayerIDs);

        // Get the next player ID
        $nextPlayerID = $activePlayerIDs[$nextPlayerIndex];

        // Update the current player ID in the session
        $_SESSION['currentPlayerID'] = $nextPlayerID;

        return $nextPlayerID;
    }

}
?>
