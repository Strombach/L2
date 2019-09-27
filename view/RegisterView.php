<?php

class RegisterView {

	private static $name = 'RegisterView::UserName';
  private static $password = 'RegisterView::Password';
  private static $passwordRepeat = 'RegisterView::PasswordRepeat';
  private static $messageId = 'RegisterView::Message';
  
  private $message = '';

  public function response() {

    if($this->userWantsToRegister()) {
      $this->checkInput();
    }

    $response = $this->generateRegisterFormHTML();
    return $response;
  }


  private function generateRegisterFormHTML() {
    $username = '';

    if($this->userWantsToRegister ()){
      $username = $this->getRequestUserName();
    }

    return ' 
    <div class="container" >
    <h2>Register new user</h2>
    <form action="?register" method="post" enctype="multipart/form-data">
      <fieldset>
      <legend>Register a new user - Write username and password</legend>
        <p id="' . self::$messageId . '">' . $this->message . '</p>
        <label for="' . self::$name . '" >Username :</label>
        <input type="text" size="20" name="' . self::$name . '" id="' . self::$name . '" value="' . $username . '" />
        <br/>
        <label for="' . self::$password . '" >Password  :</label>
        <input type="password" size="20" name="' . self::$password . '" id="' . self::$password . '" value="" />
        <br/>
        <label for="' . self::$passwordRepeat . '" >Repeat password  :</label>
        <input type="password" size="20" name="' . self::$passwordRepeat . '" id="' . self::$passwordRepeat . '" value="" />
        <br/>
        <input id="submit" type="submit" name="RegisterView::Register"  value="Register" />
        <br/>
      </fieldset>
    </form>
    </div>';
  }
  
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
    //RETURN REQUEST VARIABLE: USERNAME
    return $_POST[self::$name];
  }

  private function getRequestPassword() {
    return $_POST[self::$password];
  }

  public function userWantsToRegister () {
    if(isset($_POST["RegisterView::Register"])) {
      if($_POST["RegisterView::Register"] == 'Register'){
        return true;
      }
    }
    return false;
  }

  public function setMessage ($newMessage) {
    $this->message .= $newMessage;
  }

  private function checkInput () {
    $uname = $this->getRequestUserName();
    $pword = $this->getRequestPassword();

    if($uname == '' || empty($uname) || strlen($uname) < 3) {
      $this->setMessage('Username has too few characters, at least 3 characters. <br>');
    }

    if($pword == ''|| empty($pword) || strlen($pword) < 6) {
      $this->setMessage('Password has too few characters, at least 6 characters.');
    }
  }
}