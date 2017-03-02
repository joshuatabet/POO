<?php

  class AdminChestController extends AdminController
  {

    public function index()
    {

      if (Tools::isSubmit('view') && Tools::isValid('id_chest')) {
        if ($chest = new Chest(Tools::getValue('id_chest'))) {
          $this->assign('chest', $chest);
          $this->render('admin/chestView');
        }
      } else if (Tools::isSubmit('create')) {
        if (Tools::isValid('name')) {
          $chest = new Chest();
          $chest->name = Tools::getValue('name');
          $chest->life = Tools::getValue('life');
          $chest->def = Tools::getValue('def');
          $chest->atk = Tools::getValue('atk');
          $chest->magic = Tools::getValue('magic');
          $chest->speed = Tools::getValue('speed');
          $chest->gold = Tools::getValue('gold');
          if ($chest->create()) {
            echo 'chest create';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
            $this->render('admin/chestCreate');
        }
      // end create
      } else if (Tools::isSubmit('update')) {
        if ( Tools::isValid('id_chest')
          && Tools::isValid('name')
        ) {
          $chest = new Chest(Tools::getValue('id_chest'));
          $chest->name = Tools::getValue('name');
          $chest->life = Tools::getValue('life');
          $chest->def = Tools::getValue('def');
          $chest->atk = Tools::getValue('atk');
          $chest->magic = Tools::getValue('magic');
          $chest->speed = Tools::getValue('speed');
          $chest->gold = Tools::getValue('gold');
          if ($chest->update()) {
            echo 'chest update';
          } else {
            echo 'erreur champ formulaire';
          }
        } else {
          $chest = new Chest(Tools::getValue('id_chest'));
          $this->assign('chest', $chest);
          $this->render('admin/chestView');
        }
        // end update
      } else if (Tools::isSubmit('delete')) {
       $chest = new Chest(Tools::getValue('id_chest'));
       $chest->delete();
      }

      $chest = new Chest();
      $this->assign('chests', $chest->getAll());
      $this->render('admin/chestList');
    }
  }
