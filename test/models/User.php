<?php

class User{
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function setUser(int $id, string $name, string $email, string $password){
        if(isset($id) === 0){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        } else {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }
    }

    public function getUserAttribute(string $attribute){
        return $this->$attribute;
    }
}