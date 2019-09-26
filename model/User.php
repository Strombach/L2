<?php

class User {

  private $username = 'Admin';
  private $password = 'Password';

  public function getUsername () {
    return $this->username;
  }

  public function getPassword () {
    return $this->password;
  }
  
}