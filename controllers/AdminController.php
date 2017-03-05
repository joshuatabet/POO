<?php

  class AdminController extends ControllerCore
  {

    public function __construct()
    {
      if (Tools::isValidSession('id_user') && Tools::isValidSession('uniqid')) {
        $user = new User(Tools::getValueSession('id_user'));
        if ($user->admin && $user->uniqid == Tools::getValueSession('uniqid')) {
          return;
        }
      }
      //header('Location: index.php?controller=AdminConnectionController');
    }

  }
