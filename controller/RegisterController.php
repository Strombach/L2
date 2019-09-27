<?php

namespace controller;

class RegisterController {

  private $registerView;
  private $userStorage;

  public function __construct ($v, $us) {
    $this->registerView = $v;
    $this->userStorage = $us;
  }
}