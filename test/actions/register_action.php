<?php
session_start();

require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/models/User.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $password){
    $user = new User();
    $user->setUser(0, $name, $email, $password);

    $dao = new UserDataAccessObjectMySql($pdo);
    if($dao->checkEmailExists($user->getUserAttribute("email"))){
        header("Location:http://localhost/test/register.php");
        $_SESSION['email_in_use'] = "O email informado está em uso!";
        exit;
    } 
    $dao->create($user);
    $_SESSION['user'] = $user->getUserAttribute("name"); 
    header("Location:http://localhost/test/index.php");
    exit;
}

