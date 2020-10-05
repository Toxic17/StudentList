<?php
namespace site\core;


abstract class Controller
{
    static public function view($view,$content = [])
    {
        new View($view,$content);
    }
    static public function getConfigDb()
    {
        $json = file_get_contents(__DIR__."/../config.json");
        $dbConfig = json_decode($json,TRUE)['db'];
        return $dbConfig;
    }
}