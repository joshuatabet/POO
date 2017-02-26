<?php

  class AdminConnexionController extends AdminController
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
        if ($user->load() && $user->admin) {
            $user->newConnexion();
            header('Location: index.php?controller=AdminHomeController');
        }
      } else if (Tools::isValid('uniqid') && Tools::isValid('id_user')) {
        $user = new User(Tools::getValue('id_user'));
        if ($user->uniqid == Tools::getValue('uniqid') && $user->admin) {
          return true;
        }
      } else if (Tools::isSubmit('deconnexion')) {
        session_unset();
      }
      $this->render('admin/connexion');
    }

  }
