<?php

namespace model;

class Username {
  private static $minNameLength = 3;
  private $name = null;
  
  public function __construct($newName) {
    $this->name = $newName;

    // if(strlen($this->name) < self::$minNameLength) {
    //   throw new Exception();
    // }
  }

  public function getUsername () {
    return $this->name;
  }
}