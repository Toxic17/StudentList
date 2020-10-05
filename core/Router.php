<?php

namespace site\core;

use site\app\controllers\MainController;

class Router
{
    public $arrRoutes;

    public function __construct()
    {
        $json = file_get_contents("../config.json");
        $arr = json_decode($json,TRUE);
        $this->arrRoutes = $arr['routes'];
    }
    public function checkUrl($url)
    {
        $route =  trim($url,"/");
        if(isset($this->arrRoutes[$route]))
        {
            $controllerName = $this->arrRoutes[$route]['Controller'];
            $actionName = $this->arrRoutes[$route]['Action'];
            $controller = "site\\app\\controllers\\".$controllerName;
            $controllerClass = new $controller();
            $controllerClass->$actionName();
        }
        else
        {
            require_once __DIR__."/../app/views/404.php";
        }
    }
}