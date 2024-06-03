<?php
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../repositories/PropertiesRepository.php';
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/PropertiesService.php';

class AdminPortalController {
    private PropertiesService $propertiesService;
    private UserService $userService;

    public function __construct(PropertiesService $propertiesService, UserService $userService) {
        $this->propertiesService = $propertiesService;
        $this->userService = $userService;
    }

    public function displayAdminPortal(): void {
        $allproperties = $this->propertiesService->getAllProperties();
        $users = $this->userService->getAllUsers();
        $properties = $this->propertiesService->getproperties();

        require __DIR__ . '/../views/AdminPortal.php';
    }

    public function updateBalance(array $postData): void {
        $userId = $postData['userID'];
        $newBalance = $postData['newBalance'];
        $this->userService->updateBalance($userId, $newBalance);
        header("Location: /adminportal");
        exit();
    }

    public function assignProperty(array $postData): void {
        $userId = $postData['userID'];
        $propertyId = $postData['propertyID'];

        // Assign the property to the new user
        $this->propertiesService->assignPropertyToUser($userId, $propertyId);

        // Return a JSON response
        echo json_encode(['status' => 'success', 'message' => 'Property assigned successfully.']);
        exit();
    }
    public function deleteUser(array $postData): void {
        $userId = $postData['userID'];

        // Delete the user
        $this->userService->deleteUser($userId);

        // Redirect back to the admin portal
        header("Location: /adminportal");
        exit();
    }


}
?>
