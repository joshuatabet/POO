<?php

  class ConnexionController extends FrontController
  {
    public function __construct()
    {
      
    }

    public function index()
    {
      if (Tools::isSubmit('connexion') && Tools::isValid('email') && Tools::isValid('pass')) {
        $user = new User();
        $user->email = Tools::getValue('email');
        $user->pass = Tools::getValue('pass');
        $user->load();
        if ($user->load()) {
            $user->newConnexion();
            header('Location: index.php?controller=GameController');
        }
      } else if (Tools::isValid('uniqid') && Tools::isValid('id_user')) {
        $user = new User(Tools::getValue('id_user'));
        if ($user->uniqid == Tools::getValue('uniqid')) {
          return true;
        }
      } else if (Tools::isSubmit('deconnexion')) {
        session_unset();
      }
      $this->render('connexion');
    }

    public function connexion()
    {

    }

  }
