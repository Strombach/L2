<?php

class LoginController {

  private $lv;

  public function __construct ($v) {
    $this->lv = $v;
  }

  public function testing () {
    if(isset($_POST["LoginView::Login"])) {
      echo $this->lv->getUserName();
    }
  }
}