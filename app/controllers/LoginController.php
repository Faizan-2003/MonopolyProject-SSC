<?php
class LoginController{
    public function __construct()
    {
        //$this->userService = $userService;
    }
    public function displayLoginPage(): void
    {
            require __DIR__ . "/../Views/login.php";
    }
}