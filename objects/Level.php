<?php

  class Level extends ObjectCore
  {

    public $table = 'level';
    public $identifier = 'id_level';
    public $definition = array(
        'name' => array('type'=>'string', 'length'=>45),
        'nb_chest' => array('type'=>'int', 'isNullable'=>true),
        'nb_monster' => array('type'=>'int', 'isNullable'=>true),
        'type_monster' => array('type'=>'string', 'isNullable'=>true),
        'type_chest' => array('type'=>'string', 'isNullable'=>true),
        'position' => array('type'=>'int')
    );

    public $id_level;
    public $name;
    public $nb_chest;
    public $nb_monster;
    public $type_chest;
    public $type_monster;
    public $position;

    public $view = false;
    //public $nb_monter_life;
    //public $nb_chest_locked;
    public $monsters = array();
    public $chests = array();

    public function __construct($id_level = null)
    {
      if (parent::__construct($id_level)) {
        $this->type_monster = explode(',', $this->type_monster);
        $this->type_chest = explode(',', $this->type_chest);
        //$this->nb_monster_life = $this->nb_monster;
        //$this->nb_chest_locked = $this->nb_chest;
      }
    }

    public function getMonsterAction()
    {
      if ($this->getNbAliveMonster()) {
        return $this->monsters[0]->choiceAction();
      }
    }

    public function unlockChest()
    {
      foreach ($this->chests as &$chest) {
        if ($chest->isLocked) {
          $chest->isLocked = false;
          break;
        }
      }
    }

    public function sortMonsterBySpeed()
    {
      if (!count($this->monsters)) {
        return false;
      }
      $move = true;
      while ($move) {
        $move = false;
        for ($i=0; $i<count($this->monsters)-1; $i++) {
          if ((int)$this->monsters[$i+1]->speed > (int)$this->monsters[$i]->speed) {
            $move = true;
            $monster_buffer = clone $this->monsters[$i];
            $this->monsters[$i] = clone $this->monsters[$i+1];
            $this->monsters[$i+1] = $monster_buffer;
          }
        }
      }
    }

    public function getNbLockedChest()
    {
      $nb = 0;
      foreach ($this->chests as $chest) {
        if ($chest->isLocked) {
          $nb++;
        }
      }
      return $nb;
    }

    public function getNbAliveMonster()
    {
      $nb = 0;
      foreach ($this->monsters as $monster) {
        if ($monster->life > 0) {
          $nb ++;
        }
      }
      return $nb;
    }

    public function update()
    {
      if (is_array($this->type_monster)) {
        $this->type_monster = implode(',', $this->type_monster);
      }
      if (is_array($this->type_chest)) {
        $this->type_chest = implode(',', $this->type_chest);
      }
      return parent::update();
    }

    public function create()
    {
      if (is_array($this->type_monster)) {
        $this->type_monster = implode(',', $this->type_monster);
      }
      if (is_array($this->type_chest)) {
        $this->type_chest = implode(',', $this->type_chest);
      }
      return parent::create();
    }

    public function getAllOrdered()
    {
      return Db::getInstance()->select($this->table, '*', false, 'ORDER BY position');
    }

    public function load()
    {
      if (is_array($this->type_monster)) {
        $this->type_monster = implode(',', $this->type_monster);
      }
      if (is_array($this->type_chest)) {
        $this->type_chest = implode(',', $this->type_chest);
      }
      if (parent::load()) {
        if (!is_array($this->type_monster)) {
          $this->type_monster = explode(',', $this->type_monster);
        }
        if (!is_array($this->type_chest)) {
          $this->type_chest = explode(',', $this->type_chest);
        }
        return true;
      }
      return false;
    }
  }
