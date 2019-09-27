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

        if(isset($_SESSION["showWelcome"])) {
          if($_SESSION["showWelcome"] == false){
            $this->showWelcome();
          }
        } else {
          $this->showWelcome();
        }
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
      if(isset($_SESSION["showBye"])) {
        if($_SESSION["showBye"] == false){
          $this->showBye();
        }
      }
      $_SESSION["showWelcome"] = false;
    }
  }

  private function showWelcome() {
    $this->loginView->setMessage('Welcome');
    $_SESSION["showWelcome"] = true;
  }

  private function showBye () {
    $this->loginView->setMessage('Bye bye!');
    $_SESSION["showBye"] = true;
  }
}