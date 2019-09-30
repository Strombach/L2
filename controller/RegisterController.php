<?php

namespace controller;

class RegisterController {

  private $registerView;
  private $userStorage;

  public function __construct ($v, $us) {
    $this->registerView = $v;
    $this->userStorage = $us;

    $this->doRegister();
  }

  public function doRegister () {
    if($this->registerView->userWantsToRegister()){
      $errors = $this->registerView->checkInput();
      $creds = $this->registerView->getRequsetCredentials();
      if($this->userStorage->findUserByUsername($creds[0])){
        $this->registerView->setMessage('User exists, pick another username.<br>');
        $errors + 1;
      }

      if($errors < 1) {
        echo 'success';
      }
    }
  }
}