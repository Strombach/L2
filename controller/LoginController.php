<?php

class LoginController {

  private $lv;
  private $user;

  public function __construct ($v) {
    $this->lv = $v;
  }

  // public function testing () {
  //   if(isset($_POST["LoginView::Login"])) {
  //     $uname = $this->lv->getUserName();
  //     $pword = $this->lv->getPassword();
  //     if($this->user->authentication($uname, $pword)) {
  //       return true;
  //     }
  //   }
  // return false;
  // }
}