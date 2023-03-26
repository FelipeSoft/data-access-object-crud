<?php
require("C:/xampp/htdocs/test/config.php");
require_once("C:/xampp/htdocs/test/dao/UserDataAccessObjectMySql.php");
class Auth{
    private $pdo;
    private string $email;
    private string $password;

    public function __construct($engine){
        $this->pdo = $engine;
    }
    public function setCredentials(string $email, string $password){
        $this->email = $email;
        $this->password = $password;
    } 

    public function checkUserActivity(){
        $dao = new UserDataAccessObjectMySql($this->pdo);
        $user = $dao->getUserByEmail($this->email);
        if($user !== null){
            return password_verify($this->password, $user->getUserAttribute("password")) ? true : false;
        }
    }
}