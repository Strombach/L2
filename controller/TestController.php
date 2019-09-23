<?php

class TestController {

  public function testing () {
    if(isset($_POST["LoginView::Login"])) {
      echo "Loggin!!!!!!!!!";
    }
  }
}