<?php

namespace controller;

class LoginController {

  private $lv;
  private $userStorage;

  public function __construct ($v, $us) {
    $this->lv = $v;
    $this->userStorage = $us;
  }

  public function doLogin() {
    if($this->lv->userWantsToLogin()) {
      $this->userStorage->authAUser($this->lv->getUserCredentials());
    }
  }
}