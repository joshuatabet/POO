<?php

    class AdminLevelController extends AdminController
    {

      public function index()
      {
        if (Tools::isSubmit('view') && Tools::isValid('id_level')) {

          if ($level = new Level(Tools::getValue('id_level'))) {
            $monster = new Monster();
            $monsters = $monster->getAll();
            $this->assign(array(
              'level' => $level,
              'monsters' => $monsters
            ));
            $this->render('admin/levelView');
          }

        // end view
        } else if (Tools::isSubmit('create')) {

          if (Tools::isValid('name')) {
            $level = new Level();
            $level->name = Tools::getValue('name');
            $level->nb_chest = Tools::getValue('nb_chest');
            $level->nb_monster = Tools::getValue('nb_monster');
            $level->type_monster = Tools::getValue('type_monster');

            if ($level->create()) {
              echo 'level create';
            } else {
              echo 'erreur champ formulaire create';
            }
          } else {
            $monster = new Monster();
            $monsters = $monster->getAll();
            $this->assign('monsters', $monsters);
            $this->render('admin/levelCreate');
          }

        // end create
        } else if (Tools::isSubmit('update')) {
          if (Tools::isValid('id_level')) {
            $level = new Level(Tools::getValue('id_level'));
            $level->name = Tools::getValue('name');
            $level->nb_chest = Tools::getValue('nb_chest');
            $level->nb_monster = Tools::getValue('nb_monster');
            $level->type_monster = Tools::getValue('type_monster');
            if ($level->update()) {
              echo 'level update';
            } else {
              echo 'erreur champ formulaire update';
            }
          } else {
            $level = new Level(Tools::getValue('id_level'));
            $monster = new Monster();
            $monsters = $monster->getAll();

            $this->assign(array(
              'level' => $level,
              'monsters' => $heros
            ));
            $this->render('admin/levelView');
          }

        // end update
        } else if (Tools::isSubmit('delete')) {

         $level = new Level(Tools::getValue('id_level'));
         $level->delete();

        // end delete
        }

        $level = new Level();
        $this->assign('levels', $level->getAll());
        $this->render('admin/levelList');
      }

    }
