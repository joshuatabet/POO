<?php

  class AdminUserController extends AdminController
  {

    public function index()
    {
      if (Tools::isSubmit('view') && Tools::isValid('id_user')) {
        if ($user = new User(Tools::getValue('id_user'))) {
          $this->assign('user', $user);
          $this->render('admin/userView');
        }
      } else if (Tools::isSubmit('create')) {

        if ( Tools::isValid('nom')
          && Tools::isValid('prenom')
          && Tools::isValid('pseudo')
          && Tools::isValid('email')
          && Tools::isValid('pass')
        ) {
          $user = new User();
          $user->nom = Tools::getValue('nom');
          $user->prenom = Tools::getValue('prenom');
          $user->pseudo = Tools::getValue('pseudo');
          $user->email = Tools::getValue('email');
          $user->pass = Tools::getValue('pass');
          $user->descriptif = Tools::getValue('descriptif') ? Tools::getValue('descriptif') : '';
          $user->admin = Tools::isValid('admin') ? true : false;
          if ($user->create()) {
            echo 'user créé';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
            $this->render('admin/userCreate');
        }
      } else if (Tools::isSubmit('update')) {
        if ( Tools::isValid('id_user')
          && Tools::isValid('nom')
          && Tools::isValid('prenom')
          && Tools::isValid('pseudo')
          && Tools::isValid('email')
          && Tools::isValid('pass')
        ) {
          $user = new User(Tools::getValue('id_user'));
          $user->nom = Tools::getValue('nom');
          $user->prenom = Tools::getValue('prenom');
          $user->pseudo = Tools::getValue('pseudo');
          $user->email = Tools::getValue('email');
          $user->pass = Tools::getValue('pass');
          $user->descriptif = Tools::getValue('descriptif') ? Tools::getValue('descriptif') : '';
          $user->admin = Tools::getValue('admin') == '1'? '1' : '0';
          if ($user->update()) {
            echo 'user update';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
          $user = new User(Tools::getValue('id_user'));
          $this->assign('user', $user);
          $this->render('admin/userView');
        }
      }

      $userEntity = new UserEntity();
      $this->assign('users', $userEntity->getAll());
      $this->render('admin/userList');
    }

  }
