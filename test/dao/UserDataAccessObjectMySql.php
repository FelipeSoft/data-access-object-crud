<?php
require_once("C:/xampp/htdocs/test/models/User.php");
/**
 * Summary of UserDataAccessObjectMySql
 */
class UserDataAccessObjectMySql{
    private $pdo;
    public function __construct($engine){
        $this->pdo = $engine;
    }

    public function create(User $user){
        $sql = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $sql->bindValue(":name", $user->getUserAttribute('name'));
        $sql->bindValue(":email", $user->getUserAttribute('email'));
        $sql->bindValue(":password", password_hash($user->getUserAttribute('password'), PASSWORD_DEFAULT));
        $sql->execute();
    }

    public function all(){
        $sql = $this->pdo->prepare("SELECT * FROM users");
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $d){
                $user = new User();
                $user->setUser($d['id'], $d['name'], $d['email'], $d['password']);
                $all []= array($user);
            }
            return $all;
        }
    }

    public function update(User $user){
        $sql = $this->pdo->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        $sql->bindValue(":id", $user->getUserAttribute('id'));
        $sql->bindValue(":name", $user->getUserAttribute('name'));
        $sql->bindValue(":email", $user->getUserAttribute('email'));
        $sql->bindValue(":password", password_hash($user->getUserAttribute('password'), PASSWORD_DEFAULT));
        $sql->execute();
    }

    public function delete(int $id){
        $sql = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function getUserByEmail(string $email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->setUser($data["id"], $data["name"], $data["email"], $data["password"]);
            return $user;
        }
    }

    public function checkEmailExists(string $email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        return $sql->rowCount() > 0 ? true : false;
    }
    public function getUserById(int $id){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        $user = new User();
        $user->setUser($data['id'],$data['name'],$data['email'],$data['password']);
        return $user;
    }
}