<?php
require_once __DIR__ . '/../repositories/UserRepository.php'; // Include the file containing UserRepository class

require_once __DIR__ . '/../repositories/PropertiesRepository.php'; // Include the file containing UserRepository class
require_once __DIR__ . '/../services/UserService.php'; // Include the file containing UserService class

require_once __DIR__ . '/../services/PropertiesService.php'; // Include the file containing UserService class
class router
{
    public function route($uri)
    {

        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case '':
            case 'login':
                require __DIR__ . "/../controllers/LoginController.php";
                $controller = new LoginController();
                $controller->displayLoginPage();
                break;
            case 'adduser':
                require __DIR__ . "/../controllers/AddUserController.php";
                $controller = new AddUserController();
                $controller->displayAddUserPage();
                break;
                case 'home':
                    require __DIR__ . "/../controllers/HomeController.php";
                    $userRepository = new UserRepository();
                    $PropertiesRepository = new PropertiesRepository();
                    $PropertiesService = new PropertiesService($PropertiesRepository);
                    $userService = new UserService($userRepository); // Instantiate UserService
                    $controller = new HomeController($userService, $PropertiesService); // Pass the UserService instance to HomeController
                    $controller->displayHomePage();
                    break;
            case 'adminlogin':
                require __DIR__ . "/../controllers/LoginController.php";
                $controller = new LoginController();
                $controller->displayAdminLoginPage();
                break;
            case 'adminportal':
                require __DIR__ . "/../controllers/AdminPortalController.php";
                $PropertiesRepository = new PropertiesRepository();
                $PropertiesService = new PropertiesService($PropertiesRepository);
                $controller = new AdminPortalController($PropertiesService);
                $controller->displayAdminPortal();
                break;
            case 'api/getpropertydetails':
                require __DIR__ . '/../api/getPropertyDetails.php';
                break;
            case 'api/finishTurn':
                require __DIR__ . '/../api/PlayersTurn.php';
                break;
            case 'api/adsbyloggeduser':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->sendAdsByLoggedUser();
                break;
            case 'api/adsbypurchaseduser':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->sendPurchasedAdsByLoggedUser();
                break;
            case 'api/updateAd':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->operateAdRequest();
                break;
            case 'api/editAd':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->handleAdEditRequest();
                break;
            case 'api/searchproducts':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->handleSearchRequest();
                break;
            default:
                http_response_code(404);
                break;
        }
    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}
