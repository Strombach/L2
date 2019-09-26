<?php

namespace controller;

class LoginController {

  private $loginView;
  private $userStorage;

  public function __construct ($v, $us) {
    $this->loginView = $v;
    $this->userStorage = $us;
  }

  public function doLogin() {
    if($this->loginView->userWantsToLogin()) {
      if($this->userStorage->authAUser($this->loginView->getUserCredentials())) {
        session_start();
        $_SESSION["loggedin"] = true;
        return true;
      }
      return false;
    }
  }
}