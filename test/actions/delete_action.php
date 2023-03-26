<?php
require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if($id){
    $dao = new UserDataAccessObjectMySql($pdo);
    $dao->delete($id);
    header("Location:http://localhost/test/index.php");
    exit;
}