<?php
class AdminPortalController{
    public function __construct()
    {
        //$this->userService = $userService;
    }
    public function displayAdminPortal(): void
    {
        require __DIR__ . "/../Views/AdminPortal.php";
    }
}
?>