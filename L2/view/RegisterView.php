<?php

class RegisterView {

	private static $name = 'RegisterView::UserName';
  private static $password = 'RegisterView::Password';
  private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $messageId = 'RegisterView::Message';


  public function response() {

    $response = $this->generateRegisterFormHTML('Test Register');
    return $response;
  }


  private function generateRegisterFormHTML($message) {
    return ' 
    <div class="container" >
    <h2>Register new user</h2>
    <form action="?register" method="post" enctype="multipart/form-data">
      <fieldset>
      <legend>Register a new user - Write username and password</legend>
        <p id="' . self::$messageId . '">' . $message . '</p>
        <label for="' . self::$name . '" >Username :</label>
        <input type="text" size="20" name="' . self::$name . '" id="' . self::$name . '" value="" />
        <br/>
        <label for="' . self::$password . '" >Password  :</label>
        <input type="password" size="20" name="' . self::$password . '" id="' . self::$password . '" value="" />
        <br/>
        <label for="' . self::$passwordRepeat . '" >Repeat password  :</label>
        <input type="password" size="20" name="' . self::$passwordRepeat . '" id="' . self::$passwordRepeat . '" value="" />
        <br/>
        <input id="submit" type="submit" name="DoRegistration"  value="Register" />
        <br/>
      </fieldset>
    </form>
    </div';
	}
}