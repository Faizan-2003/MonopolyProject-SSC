<?php
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/PropertiesService.php';
class AdminPortalController {
    private PropertiesService $PropertiesService;
    private UserService $UserService;

    public function __construct(PropertiesService $PropertiesService, UserService $UserService) {
        $this->PropertiesService = $PropertiesService;
        $this->UserService = $UserService;
    }

    public function displayAdminPortal(): void {
        $additionalproperties = $this->PropertiesService->getAllProperties();
        $users = $this->UserService->getAllUsers(); // Assuming this method exists

        require __DIR__ . "/../Views/AdminPortal.php";
    }
    public function updateBalance(array $postData): void {
        // Assuming $postData contains userId and newBalance from the form submission
        $userId = $postData['userID'];
        $newBalance = $postData['newBalance'];

        // Update the balance amount in the database
        $this->UserService->updateBalance($userId, $newBalance);

        // Redirect back to the admin portal page
        header("Location: /adminportal");
        exit();
    }
}

?>
