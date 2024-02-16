<?php

class User{
    public int $userID;
    public string $userName;
    public string $gameName;
    public int $properties;
    public int $balanceAmount;
    public string $password;
    public function __construct($userData) {
        // Initialize user properties from $userData
        $this->userID = $userData['userID'] ?? 0; // Provide a default value if $userData['userID'] is not set
        $this->userName = $userData['userName'] ?? '';
        $this->gameName = $userData['gameName'] ?? '';
        $this->properties = $userData['properties'] ?? 0;
        $this->balanceAmount = $userData['balanceAmount'] ?? 0;
        $this->password = $userData['password'] ?? '';
    }

    function getUserID() {
        return $this->userID;
    }
    function getUserName() {
        return $this->userName;
    }
    function getGameName() {
        return $this->gameName;
    }
    function getProperties() {
        return $this->properties;
    }
    function getBalanceAmount() {
        return $this->balanceAmount;
    }
    function getPassword() {
        return $this->password;
    }
    function setUserID($userID) {
        $this->userID = $userID;
    }
    function setUserName($userName) {
        $this->userName = $userName;
    }
    function setGameName($gameName) {
        $this->gameName = $gameName;
    }
    function setProperties($properties) {
        $this->properties = $properties;
    }

    function setBalanceAmount($balanceAmount) {
        $this->balanceAmount = $balanceAmount;
    }
    function setPassword($password) {
        $this->password = $password;
    }
}
