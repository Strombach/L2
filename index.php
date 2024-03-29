<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('controller/LoginController.php');
require_once('model/UserStorage.php');
require_once('model/Username.php');
require_once('model/Password.php');
require_once('controller/RegisterController.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();
$rv = new RegisterView();

$us = new \model\UserStorage();
$us->loadUsers('users.json');

$lc = new \controller\LoginController($v, $us);
$rc = new \controller\RegisterController($rv, $us);

$btl = 'Back to login';
$rnu = 'Register a new user';

$loginStatus = false;

if($lc->doLogoutUser()) {
  $loginStatus = false;
} else if ($lc->doLoginUser() || isset($_SESSION["loggedIn"])) {
  $loginStatus = true;
}

if (isset ($_GET["register"])) {
  $lv->render(false, $rv, $dtv, $btl);
} else {
  $lv->render($loginStatus, $v, $dtv, $rnu);
};