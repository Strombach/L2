<?php

class App {
  private $storage;
	private $loginController;
	private $user;
  private $view;
  
  public function __construct(){
    $this->storage = new \model\UserStorage();
    $this->storage->loadUsers('users.json');

    $this->loginController = new \controller\LoginController();
  }
}