<?php
class HomeController{
    public function __construct()
    {
        //$this->userService = $userService;

    }
    public function displayHomePage(): void
    {
        session_start(); // Start the session if it's not already started
        $user = $_SESSION['userID'] ?? null; // Assuming the user data is stored in $_SESSION['user']
        require __DIR__ . "/../Views/home.php";
    }

}