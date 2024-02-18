<?php
class AdminPortalController {
    private PropertiesService $PropertiesService;

    public function __construct(PropertiesService $PropertiesService) {
        $this->PropertiesService = $PropertiesService;
    }

    public function displayAdminPortal(): void {
        $additionalproperties = $this->PropertiesService->getAllProperties();

        require __DIR__ . "/../Views/AdminPortal.php";
    }
}
?>
