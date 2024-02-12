<?php

class User{
    public int $userID;
    public string $userName;
    public string $gameName;
    public int $properties;
    public int $balanceAmount;
    public string $password;

    public function __construct($userID, $userName, $gameName, $properties, $balanceAmount, $password){
        $this->userID = $userID;
        $this->userName = $userName;
        $this->gameName = $gameName;
        $this->properties = $properties;
        $this->balanceAmount = $balanceAmount;
        $this->password = $password;
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
