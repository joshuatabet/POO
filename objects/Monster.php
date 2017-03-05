<?php

  class Monster extends Character
  {

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*', 'monster = 1');
    }

    public function choiceAction()
    {
      $actions = array('observe', 'def');
      if ($this->atk) {
        $actions[] = 'atk_atk';
      }
      if ($this->magic) {
        $action[] = 'atk_magic';
      }
      $nb = mt_rand(0,count($actions)-1);
      $action = $actions[$nb];

      return $action;
    }

  }
