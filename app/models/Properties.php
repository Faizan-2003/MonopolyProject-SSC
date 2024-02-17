<?php

class Properties
{
    private $propertyID;
    private $propertyName;
    private $propertyPrice;
    private $userID;
    private $propertyRent;
    private $oneHouse;
    private $twoHouse;
    private $threeHouse;
    private $fourHouses;
    private $hotelRent;

    public function __construct($propertyID, $propertyName, $propertyPrice, $userID, $propertyRent, $oneHouse, $twoHouse, $threeHouse, $fourHouses, $hotelRent)
    {
        $this->propertyID = $propertyID;
        $this->propertyName = $propertyName;
        $this->propertyPrice = $propertyPrice;
        $this->userID = $userID;
        $this->propertyRent = $propertyRent;
        $this->oneHouse = $oneHouse;
        $this->twoHouse = $twoHouse;
        $this->threeHouse = $threeHouse;
        $this->fourHouses = $fourHouses;
        $this->hotelRent = $hotelRent;
    }

    // Getter methods
    public function getPropertyID()
    {
        return $this->propertyID;
    }

    public function getPropertyName()
    {
        return $this->propertyName;
    }

    public function getPropertyPrice()
    {
        return $this->propertyPrice;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function getPropertyRent()
    {
        return $this->propertyRent;
    }

    public function getOneHouse()
    {
        return $this->oneHouse;
    }

    public function getTwoHouse()
    {
        return $this->twoHouse;
    }

    public function getThreeHouse()
    {
        return $this->threeHouse;
    }

    public function getFourHouses()
    {
        return $this->fourHouses;
    }

    public function getHotelRent()
    {
        return $this->hotelRent;
    }

    // Setter methods
    public function setPropertyID($propertyID)
    {
        $this->propertyID = $propertyID;
    }

    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    public function setPropertyPrice($propertyPrice)
    {
        $this->propertyPrice = $propertyPrice;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setPropertyRent($propertyRent)
    {
        $this->propertyRent = $propertyRent;
    }

    public function setOneHouse($oneHouse)
    {
        $this->oneHouse = $oneHouse;
    }

    public function setTwoHouse($twoHouse)
    {
        $this->twoHouse = $twoHouse;
    }

    public function setThreeHouse($threeHouse)
    {
        $this->threeHouse = $threeHouse;
    }

    public function setFourHouses($fourHouses)
    {
        $this->fourHouses = $fourHouses;
    }

    public function setHotelRent($hotelRent)
    {
        $this->hotelRent = $hotelRent;
    }
}

?>
