<?php

  class FrontController extends ControllerCore
  {

    public $access = 'public';

    public function __construct()
    {
      if (Tools::isValidSession('id_user') && Tools::isValidSession('uniqid')) {
        $user = new User(Tools::getValueSession('id_user'));
        if ($user->uniqid == Tools::getValueSession('uniqid')) {
          return true;
        }
      }
      header('Location: index.php?controller=ConnectionController');
    }
  }
