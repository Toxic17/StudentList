<?php

namespace site\app\controllers;

use site\app\models\AbiturienDataGeteway;
use site\core\Controller;
use site\app\helpers\LinkHelper;

class MainController extends Controller
{

    public function index()
    {
        $config = $this::getConfigDb();
        $abiturints = new AbiturienDataGeteway($config);
        $pagActive = isset($_GET['pag']) ? intval($_GET['pag']) : 1;
        $orderBy = isset($_GET['order']) ? strval($_GET['order']) : "points";
        $orderType = isset($_GET['by']) ? strval($_GET['by']) : "ASC";
        $search = !empty($_GET['search']) ? $_GET['search'] : null;
        $notesOnOnePage = 50;
        $allCountNotes = $abiturints->getCountStudents();
        $countLinksSearch = $abiturints->getCountSearchedStudents($search);
        $status = "";
        if (!empty($search) && $search !== null) {
            $allCountNotes = $countLinksSearch;
        }

        if (!empty($_COOKIE['status'])) {
            $status = $_COOKIE['status'];
        }
        $allLinksPagination = LinkHelper::paginationLinks($allCountNotes, $notesOnOnePage);
        $allResults = $abiturints->getALlStudents($pagActive, $notesOnOnePage, $orderBy, $orderType, $search);
        $content = array("studentResults" => $allResults,
            "LinksPagination" => $allLinksPagination,
            "pagAcive" => $pagActive,
            "orderBy" => $orderBy,
            "orderType" => $orderType,
            "search" => $search,
            "status" => $status,
        );

        if (!empty($_COOKIE['status'])) {
            setcookie("status", "not_active");
        }

        $this::view("MainPage", $content);
    }
}