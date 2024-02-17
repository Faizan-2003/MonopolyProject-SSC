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
}