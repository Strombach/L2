<?php

namespace controller;

session_start();

class LoginController {

  private $loginView;
  private $userStorage;

  public function __construct ($loginView, $userStorage) {
    $this->loginView = $loginView;
    $this->userStorage = $userStorage;
  }

  public function doLoginUser() {

    if($this->loginView->userWantsToLogin()) {
      // Check if user use correct credentials.
      if($this->userStorage->authAUser($this->loginView->getUserCredentials())) {
        $_SESSION["loggedIn"] = true;
        $this->shouldWelcomeShow();
        return true;
      } else {
        $this->loginView->setMessage('Wrong name or password');
        return false;
      }
    }
  }

  public function doLogoutUser(){
    if($this->loginView->userWantsToLogout() && $_SESSION["loggedIn"] = true) {
      unset($_SESSION["loggedIn"]);
      if(isset($_SESSION["showBye"])) {
        if($_SESSION["showBye"] == false){
          $this->showBye();
        }
      }
      // Reset showWelcome to false to remove the messege when user login again.
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

  private function shouldWelcomeShow() {
    if(isset($_SESSION["showWelcome"])) {
      if($_SESSION["showWelcome"] == false){
        $this->showWelcome();
      }
    } else {
      $this->showWelcome();
    }
  }
}