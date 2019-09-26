<?php

class LoginController {

  private $lv;
  private $user;

  public function __construct ($v, $user) {
    $this->lv = $v;
    $this->user = $user;
  }

  public function testing () {
    if(isset($_POST["LoginView::Login"])) {
      $username = $this->lv->getUserName();
      if($username == 'Admin') {
        echo $this->user->getUserName();
      }
    }
  }
}