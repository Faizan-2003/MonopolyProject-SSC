<?php

// Import the necessary dependencies
require_once __DIR__ . '/../services/UserService.php';

class LoginController {
    private $userService;
    private $userRepository;

    public function __construct() {
        // Initialize the UserService
        $this->userService = new UserService($this->userRepository = new UserRepository());
    }

    public function displayLoginPage(): void {
        // Load the login view
        require_once __DIR__ . '/../Views/login.php';
    }
    public function displayAdminLoginPage(): void {
        // Load the login view
        require_once __DIR__ . '/../Views/password.php';
    }
    // Method to handle login form submission
    public function loginUser(): void {
        // Check if the form is submitted via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the submitted username from the form
            $username = $_POST['username'] ?? '';

            // Perform validation if needed

            // Call the UserService to find the poppet (user) by username
            $poppet = $this->userService->findPoppetByUsername($username);

            // If a poppet is found, redirect to the home page
            if ($poppet) {
                header("Location: /home");
                exit();
            }
        }
    }
}

$controller = new LoginController();
$controller->loginUser();
?>
