<?php

namespace model;

class UserStorage {

  private $jsonData;
  private $phpObj;

  public function loadUsers ($jsonFile) {
    $this->jsonData = file_get_contents($jsonFile, true);
    $this->phpObj = json_decode($this->jsonData);
    var_dump($this->phpObj[1]);
  }

  private function findUserByUsername ($uname) {
    for ($i = 0; $i < sizeof($this->phpObj); $i++) {
      if($this->phpObj[$i]->username === $uname){
        return $this->phpObj[$i];
      }
    }
  }

  public function authAUser ($creds) {
    $user = $this->findUserByUsername($creds[0]);

    if($user->password == $creds[1]) {
      echo "Logged In";
    }
  }
}