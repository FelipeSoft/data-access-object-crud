<?php
session_start();

require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/models/User.php");
require_once("C:/xampp/htdocs/test/models/Auth.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if($email && $password){
    $auth = new Auth($pdo);
    $auth->setCredentials($email, $password);

    if($auth->checkUserActivity()){
        $dao = new UserDataAccessObjectMySql($pdo);
        header("Location:../index.php");
        $_SESSION['user'] = $dao->getUserByEmail($email)->getUserAttribute("name");
        exit;
    } 
    header("Location:../login.php");
    $_SESSION['incorrect_credentials'] = "Email e/ou senha incorretos!";
    exit;
}