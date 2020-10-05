<?php
namespace site\app\helpers;

class Validator
{
    public $errors = [];
    public $postDates;


    public function __construct($post)
    {
        $this->postDates = $post;
    }

    public function validationName()
    {
        if(strlen($this->postDates['user_name']) >= 25 OR strlen($this->postDates['user_name']) < 2)
        {
            $this->errors['name'] = "Имя пользователя должно содержать от 3 до 25 символов";
        }
    }
    public function validationSurname()
    {
        if(strlen($this->postDates['surname']) >= 50 OR strlen($this->postDates['surname']) < 2)
        {
            $this->errors['user_surname'] = "Фамилия пользователя должна содержать от 3 до 50 символов";
        }
    }
    public function validationNumber_group()
    {
       if(strlen($this->postDates['number_group']) >= 5 OR strlen($this->postDates['number_group']) < 1)
       {
           $this->errors['number_group'] = "Номер группы должен содержать от 2 до 5 символов";
       }
    }
    public function validationEmail($emails)
    {
        if(strlen($this->postDates['email']) >= 100 OR strlen($this->postDates['email']) < 5)
        {
            $this->errors['email'] = "Поле email должно содержать от 6 до 100 символов";
        }
            foreach ($emails as $email) {
                if ($this->postDates['email'] == $email[0]) {
                    if(!empty($_COOKIE['userEmail']) AND $email[0] != $_COOKIE['userEmail'])
                    {
                        $this->errors['email'] = "Данный email занят. Он должен быть уникален";
                    }
                }
            }
    }

    public function validationPoints()
    {
        if($this->postDates['points'] == "")
        {
            $this->errors['points'] = "Необходимо ввести количество баллов";
        }
        elseif($this->postDates['points'] < 100 OR $this->postDates['points'] > 500)
        {
            $this->errors['points'] = "Количество баллов должно быть от 100 до 500";
        }
    }
    public function validationBirthday()
    {
        if($this->postDates['birthday'] == "")
        {
            $this->errors['birthday'] = "Поле день рождение небходимо заполнить";
        }
        elseif(strtotime($this->postDates['birthday']) <= date("d.m.Y",strtotime("-18 year")))
        {
            $this->errors['birthday'] = "Минимальный возраст абитуриента 18 лет";
        }
    }

    public function checkOnErrros($emails)
    {

        $this->validationName();
        $this->validationSurname();
        $this->validationNumber_group();
        $this->validationEmail($emails);
        $this->validationPoints();
        $this->validationBirthday();

        return $this->errors;
    }
}
