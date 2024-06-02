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
                $UserRepository = new UserRepository();

                $PropertiesService = new PropertiesService($PropertiesRepository);
                $UserService = new UserService($UserRepository); // Instantiate UsersService correctly
                $controller = new AdminPortalController($PropertiesService, $UserService);

                $controller->displayAdminPortal();
                break;
            case 'updatebalance':
                require __DIR__ . "/../controllers/AdminPortalController.php";
                $PropertiesRepository = new PropertiesRepository();
                $UserRepository = new UserRepository();

                $PropertiesService = new PropertiesService($PropertiesRepository);
                $UserService = new UserService($UserRepository);
                $controller = new AdminPortalController($PropertiesService, $UserService);

                // Call the updateBalance method with the POST data
                $controller->updateBalance($_POST);
                break;
            case 'assignproperty':
                require __DIR__ . "/../controllers/AdminPortalController.php";
                $controller = new AdminPortalController(new PropertiesService(new PropertiesRepository()), new UserService(new UserRepository()));
                $controller->assignProperty($_POST);
                break;

            case 'deleteuser':
                require __DIR__ . "/../controllers/AdminPortalController.php";
                $controller = new AdminPortalController(new PropertiesService(new PropertiesRepository()), new UserService(new UserRepository()));
                $controller->deleteUser($_POST);
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
