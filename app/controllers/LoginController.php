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

            // Call the UserService to find the poppet (user) by username
            $poppet = $this->userService->findPoppetByUsername($username);

            // If a poppet is found
            if ($poppet) {
                // Check if the poppet gameName is "Marker" or "Boat"
                $poppetGameName = isset($poppet['gameName']) ? $poppet['gameName'] : '';
                if ($poppetGameName == "Marker" || $poppetGameName == "Boat") {
                    // Redirect to the password page with user ID
                    header("Location: /adminlogin?userId=" . (isset($poppet['id']) ? $poppet['id'] : ''));
                    exit();
                } else {
                    // Redirect to the home page with user ID
                    header("Location: /home?userId=" . (isset($poppet['id']) ? $poppet['id'] : ''));
                    exit();
                }
            }
        }
    }
}

$controller = new LoginController();
$controller->loginUser();
?>
