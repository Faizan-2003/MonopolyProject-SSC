<?php
class AddUserController{
    public function __construct()
    {
        //$this->userService = $userService;
    }
    public function displayAddUserPage(): void
    {
            require __DIR__ . "/../Views/adduser.php";
    }
}