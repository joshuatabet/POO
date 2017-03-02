<?php

  class Hero extends Character
  {
    public $gold = 0;

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*', 'hero = 1');
    }
  }
