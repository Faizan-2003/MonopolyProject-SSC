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
        if(isset($_POST["submit"])) {
            $userName = $_POST['name'] ?? '';
            $gameName = $_POST['poppet'] ?? '';

            // Check if the form data is not empty
            if (!empty($userName) && !empty($gameName)) {
                // Call the method to add the user to the database
                $success = $this->userService->addUser($userName, $gameName);

                if ($success) {
                    // Redirect to the home page after adding the user
                    header('Location: home.php');
                    exit();
                }
            } else {
                // Display an error message if form data is incomplete
                echo 'Incomplete form data.';
            }
        }
    }

}

$controller = new AddUserController();
$controller->addUser();
?>