<?php

require_once('model/User.php');
require_once('model/UserStorage.php');

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
  private static $messageId = 'LoginView::Message';	

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
    $message = '';

    if($this->userWantsToLogin()) {
      $message = $this->checkInput();
    }
		
		$response = $this->generateLoginFormHTML($message);
		//$response .= $this->generateLogoutButtonHTML($message);
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {

    $username = '';

    if($this->userWantsToLogin ()){
      $username = $this->getRequestUserName();
    }

		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $username . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
    //RETURN REQUEST VARIABLE: USERNAME
    return $_POST[self::$name];
  }

  private function getRequestPassword() {
    return $_POST[self::$password];
  }
  
  // public function getUsername() {
  //   return $this->getRequestUserName();
  // }

  // public function getPassword() {
  //   return $this->getRequestPassword();
  // }

  private function userWantsToLogin () {
    if(isset($_POST[self::$login])) {
      return true;
    }
    return false;
  }

  public function userFilledInUserName () {
    if(!empty($_POST[self::$name])) {
      return true;
    }
    return false;
  }

  public function userFilledInPassword () {
    if(!empty($_POST[self::$password])) {
      return true;
    }
    return false;
  }

  private function checkInput () {
    $uname = $this->getRequestUserName();
    $pword = $this->getRequestPassword();

    if($uname == '') {
      return 'Username is missing';
    }

    if($pword == '') {
      return 'Password is missing';
    }

    $user = new User('Admin', '123');
    if(!$user->authentication($uname, $pword)) {
      return 'Wrong name or password';
    }
    return 'Logged In <3';
  }
}