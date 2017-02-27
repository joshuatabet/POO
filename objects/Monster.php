<?php

  class Monster extends Character
  {

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*', 'monster = 1');
    }

  }
