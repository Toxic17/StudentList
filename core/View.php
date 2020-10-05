<?php

namespace site\core;


class View
{
    public function __construct($view,$content = [])
    {
        require_once "../app/views/layouts/header.php";
        require_once "../app/views/".$view.".php";
        require_once "../app/views/layouts/footer.php";
    }
}