<?php
require_once __DIR__ . '/../services/UserService.php';

class AddUserController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService(new UserRepository());
    }

    public function displayAddUserPage(): void {
        require __DIR__ . '/../Views/AddUser.php';
    }

    public function addUser(): void {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userName = $_POST['name'] ?? '';
            $gameName = $_POST['poppet'] ?? '';

            if (!empty($userName) && !empty($gameName)) {
                $success = $this->userService->addUser($userName, $gameName);
                if ($success) {
                    exit();
                }
            } else {
                echo 'Incomplete form data.';
            }
        }
    }

}

$controller = new AddUserController();
$controller->addUser();
?>