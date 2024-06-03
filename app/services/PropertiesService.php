<?php
require_once __DIR__ . '/../repositories/UserRepository.php';

class PropertiesService
{
    private $propertiesRepository;

    public function __construct(PropertiesRepository $propertiesRepository)
    {
        $this->propertiesRepository = $propertiesRepository;
    }

    public function getPropertyDetails($propertyId)
    {
        return $this->propertiesRepository->getPropertyDetails($propertyId);
    }
    public function getAllProperties()
    {
        return $this->propertiesRepository->getAllProperties();
    }
    public function getPropertyById($propertyId)
    {
        return $this->propertiesRepository->getPropertyById($propertyId);
    }
    public function removePropertyFromAllUsers($propertyId)
    {
        return $this->propertiesRepository->removePropertyFromAllUsers($propertyId);
    }
    public function assignPropertyToUser($userId, $propertyId)
    {
        return $this->propertiesRepository->assignPropertyToUser($userId, $propertyId);
    }
    public function getproperties()
    {
        return $this->propertiesRepository->getproperties();
    }
    public function getPropertyDetailsWithUsername()
    {
        return $this->propertiesRepository->getPropertyDetailsWithUsername();
    }
}