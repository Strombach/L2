<?php

class UserStorage {

  private $jsonFile;
  private $phpObj;

  public function __construct ($json) {
    $this->jsonFile = file_get_contents($json, true);
    $this->phpObj = json_decode($this->jsonFile);
    $this->findUserByUsername('adminTest1');
  }

  public function findUserByUsername ($uname) {
    foreach ($this->phpObj as $key => $value) {
      if($value->username == $uname){
        return $value;
      } else {
        return false;
      }
    }
  }
}