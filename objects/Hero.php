<?php

  class Hero extends Character
  {
    public $gold;

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*', 'hero = 1');
    }
  }
