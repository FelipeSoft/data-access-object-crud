<?php
require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/models/User.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email){
    $user = new User();
    $user->setUser($id, $name, $email, $password);
    
    $dao = new UserDataAccessObjectMySql($pdo);
    $dao->update($user);

    header("Location:http://localhost/test/index.php");
    exit;
}
