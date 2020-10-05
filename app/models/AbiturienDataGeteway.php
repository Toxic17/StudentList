<?php

namespace site\app\models;

use PDO;

class AbiturienDataGeteway
{
    public $pdo;

    public function __construct($config)
    {
        $user = $config['name'];
        $password = $config['password'];
        $dbName = $config['dbName'];
        $charset = $config['charset'];
        $host = $config['host'];

        $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getALlStudents($pagActive, $notesOnOnePage, $orderBy, $orderType = "DESC", $search)
    {
        $from = ($pagActive - 1) * $notesOnOnePage;
        if (empty($search)) {
            $allNodes = $this->pdo->prepare("SELECT * FROM results ORDER BY $orderBy $orderType  LIMIT ?,?");
            $allNodes->bindValue(1, $from, PDO::PARAM_INT);
            $allNodes->bindValue(2, $notesOnOnePage, PDO::PARAM_INT);
            $allNodes->execute();
            return $allNodes->fetchAll();
        } else {
            $allNodes = $this->pdo->prepare("SELECT * FROM results WHERE user_name LIKE :search OR 
            surname LIKE :search OR gender LIKE :search OR number_group LIKE :search OR 
            email LIKE :search OR points LIKE :search OR birthday LIKE :search OR city LIKE :search 
             ORDER BY $orderBy $orderType LIMIT :from ,:to");
            $allNodes->bindValue(":search", "%$search%", PDO::PARAM_STR);
            $allNodes->bindValue(":from", (int)$from, PDO::PARAM_INT);
            $allNodes->bindValue(":to", (int)$notesOnOnePage, PDO::PARAM_INT);
            $allNodes->execute();
            return $allNodes->fetchAll();
        }
    }

    public function getCountStudents()
    {
        $count = $this->pdo->query("SELECT COUNT(*) FROM results");
        return $count->fetch()[0];
    }

    public function getCountSearchedStudents($search)
    {
        $countNodes = $this->pdo->prepare("SELECT COUNT(*) FROM results WHERE user_name LIKE :search OR 
            surname LIKE :search OR gender LIKE :search OR number_group LIKE :search OR 
            email LIKE :search OR points LIKE :search OR birthday LIKE :search OR city LIKE :search ");
        $countNodes->bindValue(":search", "%$search%", PDO::PARAM_STR);
        $countNodes->execute();
        return $countNodes->fetchAll()[0][0];
    }

    public function insertDates($post)
    {
        $sql = "INSERT INTO results(user_name, surname, gender, number_group, email, points, birthday, city)
        VALUES (:name,:surname,:gender,:number_group,:email,:points,:birthday,:city);";
        $smtp = $this->pdo->prepare($sql);
        $smtp->execute(['name' => $post['user_name'], 'surname' => $post['surname'], 'gender' => $post['gender'],
            'number_group' => $post['number_group'], 'email' => $post['email'], 'points' => $post['points'],
            'birthday' => $post['birthday'], 'city' => $post['city']]);
    }

    public function getEmails()
    {
        $sql = "Select email FROM results";
        $smtp = $this->pdo->query($sql);
        return $smtp->fetchAll();
    }

    public function getIdFromEmail($email)
    {
        $sql = "SELECT id FROM results WHERE email = :email";
        $smtp = $this->pdo->prepare($sql);
        $smtp->execute(array("email" => $email));
        return $smtp->fetchAll()[0];
    }

    public function getDatesFromId($id)
    {
        $sql = "SELECT * FROM results WHERE id = :id";
        $smtp = $this->pdo->prepare($sql);
        $smtp->execute(array("id" => $id));
        return $smtp->fetchAll()[0];
    }

    public function updateDates($post)
    {
        $sql = "UPDATE results SET user_name=:name, surname=:surname, gender=:gender, number_group=:number_group,
        email=:email,points=:points,birthday=:birthday,city=:city WHERE email = :email";
        $smtp = $this->pdo->prepare($sql);
        $smtp->execute(['name' => $post['user_name'], 'surname' => $post['surname'], 'gender' => $post['gender'],
            'number_group' => $post['number_group'], 'email' => $post['email'], 'points' => $post['points'],
            'birthday' => $post['birthday'], 'city' => $post['city']]);
    }
}
