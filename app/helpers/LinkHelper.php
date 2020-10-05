<?php
namespace site\app\helpers;
use site\app\models\AbiturienDataGeteway;


class LinkHelper
{
    public static function paginationLinks($allPages,$notesOnOnePage)
    {
        return ceil(($allPages)/$notesOnOnePage);
    }
}