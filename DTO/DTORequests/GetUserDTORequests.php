<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GetUserDTORequests{
    private $id, $username, $email, $is_admin,$password;

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }



    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }    
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    
    function getIs_admin() {
        return $this->is_admin;
    }

    function setIs_admin($is_admin) {
        $this->is_admin = $is_admin;
    }


    
}

