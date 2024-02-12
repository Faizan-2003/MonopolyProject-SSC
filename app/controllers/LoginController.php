<?php

// Import the necessary dependencies
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../models/User.php';

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
                } else {
                    // Redirect to the home page with user ID
                    header("Location: /home?userId=" . (isset($poppet['id']) ? $poppet['id'] : ''));
                }
            }
        }
    }
    public function LoginAdmin(): void {
        // Check if the form is submitted via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the submitted password from the form
            $password = $_POST['password'] ?? '';

            // Retrieve the user ID from the query string
            $userId = isset($_GET['userId']) ? (int)$_GET['userId'] : 0;

            // Verify the password
            if ($this->verifyPassword($password, $userId)) {
                // Redirect to the admin portal with user ID
                header("Location: /adminportal?userId=" . $userId);
                exit(); // Ensure script execution stops after redirection
            }
        }
    }

    public function verifyPassword(string $password, int $userId): bool {
        // Retrieve the hashed password from the database based on the user ID
        $hashedPassword = $this->userService->getHashedPasswordById($userId);

        // Check if the hashed password is fetched successfully and is not null
        if ($hashedPassword !== null) {
            // Check if the password matches the hashed password stored in the database
            return password_verify($password, $hashedPassword);
        } else {
            // Handle the case where hashed password is null (e.g., user not found)
            return false;
        }
    }


}

$controller = new LoginController();
$controller->loginUser();
$controller->LoginAdmin();
?>
