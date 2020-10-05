<?php

namespace site\app\helpers;

class UserHelper
{
    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function getDates()
    {
        $arrDates['user_name'] = $this->checkPostString("user_name");
        $arrDates['surname'] = $this->checkPostString("surname");
        $arrDates['gender'] = $this->checkSexVar("gender");
        $arrDates['number_group'] = $this->checkPostString("number_group");
        $arrDates['email'] = $this->checkPostString("email");
        $arrDates['points'] = $this->checkInt("points");
        $arrDates['birthday'] = $this->checkPostString("birthday");
        $arrDates['city'] = $this->checkCity("city");
        return $arrDates;
    }

    public function checkPostString($name)
    {
        if (isset($this->post[$name])) {
            return strval(trim($this->post[$name]));
        } else {
            return "";
        }
    }

    public function checkSexVar($name)
    {
        if (isset($this->post[$name])) {
            return strval(trim($this->post[$name]));
        } else {
            return "муж";
        }
    }

    public function checkInt($name)
    {
        if (isset($this->post[$name])) {
            return intval(trim($this->post[$name]));
        } else {
            return 0;
        }
    }

    public function checkCity($name)
    {
        if (isset($this->post[$name])) {
            return strval(trim($this->post[$name]));
        } else {
            return "местный";
        }
    }

    public function fillingActiveUser($user, $post)
    {
        $arr['user_name'] = $this->fillAttr($user, $post, "user_name");
        $arr['surname'] = $this->fillAttr($user, $post, "surname");
        $arr['gender'] = $this->fillAttr($user, $post, "gender");
        $arr['number_group'] = $this->fillAttr($user, $post, "number_group");
        $arr['email'] = $this->fillAttr($user, $post, "email");
        $arr['points'] = $this->fillAttr($user, $post, "points");
        $arr['birthday'] = $this->fillAttr($user, $post, "birthday");
        $arr['city'] = $this->fillAttr($user, $post, "city");
        return $arr;
    }

    public function fillAttr($user, $post = [], $name)
    {
        if (!empty($post)) {
            return htmlspecialchars(trim($post[$name]));
        } else {
            return htmlspecialchars($user[$name]);
        }
    }
}