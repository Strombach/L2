<?php

namespace model;

class Password {
  private static $minWordLength = 6;
  private $password = null;
  
  public function __construct($newPassword) {
    $this->password = $newPassword;

    // if(strlen($this->password) < self::$minWordLength) {
    //   throw new Exception();
    // }
  }

  public function getPassword () {
    return $this->password;
  }
}