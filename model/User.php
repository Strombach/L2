<?php

namespace model;

class User {

  private $username;
  private $password;

  public function __construct ($uname, $pword) {
    $this->username = $uname;
    $this->password = $pword;
  }

  public function getUsername () {
    return $this->username;
  }

  public function getPassword () {
    return $this->password;
  }

  private function checkUsername ($enteredUserName){
    if($enteredUserName == $this->username){
      return true;
    }
    return false;
  }

  private function checkPassword ($enteredPassword){
    if($enteredPassword == $this->password){
      return true;
    }
    return false;
  }

  public function authentication($uname, $pword){
    if($this->checkUsername($uname) && $this->checkPassword($pword)) {
        return true;
    }
    return false;
  }
}