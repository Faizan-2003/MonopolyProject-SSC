<?php
require_once __DIR__ . '/../models/User.php';

function getLoggedUser() {
    if (isset($_SESSION['loggedUser'])) {
        return $_SESSION['loggedUser'];
    } else {
        return null;
    }
}

function assignLoggedUserToSession(User $user): void
{
    session_start(); // Ensure session is started before setting the user
    $_SESSION['loggedUser'] = $user;
}
?>
