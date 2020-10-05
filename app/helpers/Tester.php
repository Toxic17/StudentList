<?php

namespace site\app\helpers;

use Faker;
use site\app\models\AbiturienDataGeteway;


class Tester
{

    public function getDbConfig()
    {
        $json = file_get_contents(__DIR__."/../../config.json");
        $dbConfig = json_decode($json,TRUE)['db'];
        return $dbConfig;
    }

    public function setDbDates()
    {
        $abiturient = new AbiturienDataGeteway($this->getDbConfig());
        $faker = Faker\Factory::create();
        for($i=0; $i<=100;$i++) {
            $genderUser = $faker->randomElement(array("male","female"));
            $arrDates['user_name']= $faker->firstName($gender = $genderUser);
            $arrDates['surname'] = $faker->lastName($gender = $genderUser);
            $arrDates['gender'] = $this->currentGender($genderUser);
            $arrDates['number_group'] = $faker->randomElement(array("A120","B220","F640","E150","K230"));
            $arrDates['email'] = $faker->unique()->email;
            $arrDates['points'] = $faker->numberBetween($min = 100, $max = 500);
            $arrDates['birthday'] = $faker->date($format = 'Y-m-d', $max = '-18years');
            $arrDates['city'] = $faker->randomElement(array("местный","иногородний"));
            $abiturient->insertDates($arrDates);
        }
        echo "Скрипт закончил работу";
    }

    public function currentGender($name)
    {
        if($name == 'male')
        {
            return "муж";
        }
        else
        {
            return "жен";
        }
    }
}
