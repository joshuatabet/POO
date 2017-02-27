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

        if ( Tools::isValid('lastname')
          && Tools::isValid('firstname')
          && Tools::isValid('pseudo')
          && Tools::isValid('email')
          && Tools::isValid('pass')
        ) {
          $user = new User();
          $user->lastname = Tools::getValue('lastname');
          $user->firstname = Tools::getValue('firstname');
          $user->pseudo = Tools::getValue('pseudo');
          $user->email = Tools::getValue('email');
          $user->pass = Tools::getValue('pass');
          $user->description = Tools::getValue('description') ? Tools::getValue('description') : '';
          $user->admin = Tools::isValid('admin') ? true : false;
          if ($user->create()) {
            echo 'user create';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
            $this->render('admin/userCreate');
        }
        // end create
      } else if (Tools::isSubmit('update')) {
        if ( Tools::isValid('id_user')
          && Tools::isValid('lastname')
          && Tools::isValid('firstname')
          && Tools::isValid('pseudo')
          && Tools::isValid('email')
          && Tools::isValid('pass')
        ) {
          $user = new User(Tools::getValue('id_user'));
          $user->lastname = Tools::getValue('lastname');
          $user->firstname = Tools::getValue('firstname');
          $user->pseudo = Tools::getValue('pseudo');
          $user->email = Tools::getValue('email');
          $user->pass = Tools::getValue('pass');
          $user->description = Tools::getValue('description') ? Tools::getValue('description') : '';
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
        // end update
      } else if (Tools::isSubmit('delete') && Tools::isValid('id_user')) {
        $user = new User(Tools::getValue('id_user'));
        $user->delete();
      }

      $user = new User();
      $this->assign('users', $user->getAll());
      $this->render('admin/userList');
    }

  }
