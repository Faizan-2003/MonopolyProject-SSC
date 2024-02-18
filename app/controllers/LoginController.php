<?php
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../logic/LogInandOut.php';

class LoginController {
    private $userService;
    private $userRepository;

    public function __construct() {
        $this->userService = new UserService($this->userRepository = new UserRepository());
    }

    public function displayLoginPage(): void {
        require_once __DIR__ . '/../Views/login.php';
    }

    public function displayAdminLoginPage(): void {
        require_once __DIR__ . '/../Views/password.php';
    }

    public function loginUser(): void {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'] ?? '';
            $poppet = $this->userService->findPoppetByUsername($username);

            if ($poppet) {
                $user = new User($poppet);
                assignLoggedUserToSession($user);

                $redirectUrl = $poppet['gameName'] == "Marker" || $poppet['gameName'] == "Boat" ? "/adminportal" : "/home";
                header("Location: $redirectUrl");
                exit();
            }
        }
    }
}

$controller = new LoginController();
$controller->loginUser();
?>
