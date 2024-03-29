<?php

namespace model;

class UserStorage {

  private $jsonData;
  private $phpObj;

  public function loadUsers ($jsonFile) {
    $this->jsonData = file_get_contents($jsonFile, true);
    $this->phpObj = json_decode($this->jsonData);
  }

  public function findUserByUsername ($uname) {
    for ($i = 0; $i < sizeof($this->phpObj); $i++) {
      if($this->phpObj[$i]->username === $uname){
        return $this->phpObj[$i];
      }
    }
    return false;
  }

  public function authAUser ($creds) {
    $user = $this->findUserByUsername($creds[0]);

    if($user) {
      if($user->password == $creds[1]) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function saveUser ($newUser) {

  }
}