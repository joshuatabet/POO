<?php

  class Hero extends Character
  {
    public $gold = 0;
    public $nb_click_defend = 0;
    public $bonusAtk = 0;
    public $bonusDef = 0;
    public $bonusMagic = 0;
    public $bonusSpeed = 0;

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*', 'hero = 1');
    }

    public function setChest($chest)
    {
      $this->life += $chest->life;
      $this->gold += $chest->gold;
      $this->bonusAtk = $chest->atk ? (int)$chest->atk : $this->bonusAtk;
      $this->bonusDef = $chest->def ? (int)$chest->def : $this->bonusDef;
      $this->bonusMagic = $chest->magic ? (int)$chest->magic : $this->bonusMagic;
      $this->bonusSpeed = $chest->speed ? (int)$chest->speed : $this->bonusSpeed;
    }

    public function getAtk()
    {
      return $this->atk + $this->bonusAtk;
    }

    public function getDef()
    {
      return $this->def + $this->bonusDef;
    }

    public function getMagic()
    {
      return $this->magic + $this->bonusMagic;
    }

    public function getSpeed()
    {
      return $this->speed + $this->bonusSpeed;
    }

}
