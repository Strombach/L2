<?php

namespace controller;

session_start();

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
        $_SESSION["loggedIn"] = true;
        $this->loginView->setMessage('Welcome');
        return true;
      } else {
        $this->loginView->setMessage('Wrong name or password');
        return false;
      }
    }
  }

  public function doLogout(){
    if($this->loginView->userWantsToLogout() && $_SESSION["loggedIn"] = true) {
      unset($_SESSION["loggedIn"]);
      $this->loginView->setMessage('Bye bye!');
    }
  }
}