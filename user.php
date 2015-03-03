<?php
class User {
    private $username;
    private $password;
    
public function __construct($uname, $pass) {
       $this->username = $uname;
       $this->password = $pass;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
     public function getPassword() {
        return $this->password;
    }
}