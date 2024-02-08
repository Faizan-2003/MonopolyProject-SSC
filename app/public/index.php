<?php

require_once __DIR__ . '/../routers/router.php';

$router = new Router();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router->route($uri);
?>