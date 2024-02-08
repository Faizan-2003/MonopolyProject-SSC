<?php
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
                $controller = new HomeController();
                $controller->displayHomePage();
                break;
            case 'api/adsapi':
                require __DIR__ . '/../API/AdsController.php';
                $controller = new AdsController();
                $controller->postNewAdRequest();
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
