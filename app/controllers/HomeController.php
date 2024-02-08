<?php
class HomeController{
    public function __construct()
    {
        //$this->userService = $userService;
    }
    public function displayHomePage(): void
    {
        require __DIR__ . "/../Views/home.php";
    }
}