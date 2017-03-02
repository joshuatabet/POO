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
        'type_chest' => array('type'=>'string', 'isNullable'=>true)
    );

    public $id_level;
    public $name;
    public $nb_chest;
    public $nb_monster;
    public $type_chest;
    public $type_monster;

    public $view = false;

    public function __construct($id_level = null)
    {
      if (parent::__construct($id_level)) {
        $this->type_monster = explode(',', $this->type_monster);
        $this->type_chest = explode(',', $this->type_chest);
      }
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

    public function load()
    {
      if (is_array($this->type_monster)) {
        $this->type_monster = implode(',', $this->type_monster);
      }
      if (is_array($this->type_monster)) {
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
