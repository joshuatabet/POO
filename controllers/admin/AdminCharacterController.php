<?php

  class AdminCharacterController extends AdminController
  {

    public function index()
    {
      if (Tools::isSubmit('view') && Tools::isValid('id_character')) {
        if ($character = new Character(Tools::getValue('id_character'))) {
          $this->assign('character', $character);
          $this->render('admin/characterView');
        }
      } else if (Tools::isSubmit('create')) {

        if (Tools::isValid('name') && Tools::isValid('life')) {
          $character = new Character();
          $character->name = Tools::getValue('name');
          $character->life = Tools::getValue('life');
          $character->def = Tools::getValue('def');
          $character->atk = Tools::getValue('atk');
          $character->magic = Tools::getValue('magic');
          $character->speed = Tools::getValue('speed');
          $character->monster = Tools::getValue('monster');
          $character->hero = Tools::getValue('hero');
          $character->variation_atk = Tools::getValue('variation_atk');
          $character->variation_def = Tools::getValue('variation_def');
          $character->variation_magic = Tools::getValue('variation_magic');
          $character->variation_speed = Tools::getValue('variation_speed');
          if ($character->create()) {
            echo 'character create';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
            $this->render('admin/characterCreate');
        }
      // end create
      } else if (Tools::isSubmit('update')) {
        if ( Tools::isValid('id_character')
          && Tools::isValid('name')
          && Tools::isValid('life')
        ) {
          $character = new Character(Tools::getValue('id_character'));
          $character->name = Tools::getValue('name');
          $character->life = Tools::getValue('life');
          $character->def = Tools::getValue('def');
          $character->atk = Tools::getValue('atk');
          $character->magic = Tools::getValue('magic');
          $character->speed = Tools::getValue('speed');
          $character->monster = Tools::getValue('monster');
          $character->hero = Tools::getValue('hero');
          $character->variation_atk = Tools::getValue('variation_atk');
          $character->variation_def = Tools::getValue('variation_def');
          $character->variation_magic = Tools::getValue('variation_magic');
          $character->variation_speed = Tools::getValue('variation_speed');
          if ($character->update()) {
            echo 'character update';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
          $character = new Character(Tools::getValue('id_character'));
          $this->assign('character', $character);
          $this->render('admin/characterView');
        }
        // end update
      } else if (Tools::isSubmit('delete')) {
       $character = new Character(Tools::getValue('id_character'));
       $character->delete();
     }

      $character = new Character();
      $this->assign('characters', $character->getAll());
      $this->render('admin/characterList');
    }

  }
