<?php

class UserStorage {

  private $jsonFile;
  private $phpObj;

  public function __construct ($json) {
    $this->jsonFile = file_get_contents($json, true);
    $this->phpObj = json_decode($this->jsonFile);
    var_dump($this->phpObj);
  }
}