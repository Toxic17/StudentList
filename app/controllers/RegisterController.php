<?php

namespace site\app\controllers;

session_start();

use site\app\helpers\Tester;
use site\app\helpers\Validator;
use site\app\helpers\UserHelper;
use site\core\Controller;
use site\app\models\AbiturienDataGeteway;

class RegisterController extends Controller
{
    public function main()
    {
        $errors = [];

        $config = $this::getConfigDb();
        $abiturints = new AbiturienDataGeteway($config);

        if (!empty($_GET['change'])) {
            $change = $_GET['change'];
        } else {
            $change = null;
        }
        $user = new UserHelper($_POST);
        $userDates = $user->getDates();
        $csrf_token = hash_hmac("sha256", "This is message to hash", bin2hex(random_bytes(64)));
        $activeUserDates = null;
        if (!empty($_COOKIE['userEmail'])) {
            $email = $_COOKIE['userEmail'];
            $id = $abiturints->getIdFromEmail($email)[0];
            $activeUserDates = $abiturints->getDatesFromId($id);
            $activeUserDates = $user->fillingActiveUser($activeUserDates, $_POST);
        }
        if (empty($_SESSION['csrf'])) {
            $_SESSION['csrf'] = $csrf_token;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (hash_equals($_POST['csrf'], $_SESSION['csrf'])) {
                $validator = new Validator($userDates);
                $emails = $abiturints->getEmails();
                $errors = $validator->checkOnErrros($emails);
                if (empty($errors) and $change != true) {
                    $abiturints->insertDates($_POST);
                    setcookie("userEmail", $_POST['email']);
                    setcookie("status", "active");
                    header("Location:/");
                } elseif (empty($errors)) {
                    $abiturints->updateDates($_POST);
                    $_SESSION['status'] = "changed";
                }
            } else {
                throw new Exception("Ошибка обработки формы");
            }
        }
        $this::view("RegisterPage", ['errors' => $errors, "userDates" => $userDates, "csrf" => $_SESSION['csrf'], 'activeUserDates' => $activeUserDates, 'change' => $change]);
        $_SESSION['status'] = null;
    }

}