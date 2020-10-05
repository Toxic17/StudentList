<?php
require_once "../vendor/autoload.php";

$route = new \site\core\Router();
$route->checkUrl(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));