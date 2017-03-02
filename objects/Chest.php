<?php

  class Chest extends ObjectCore
  {
    public $table = 'chest';
    public $identifier = 'id_chest';
    public $definition = array(
      'name' => array('type'=>'string', 'length'=>45),
      'life' => array('type'=>'int', 'isNullable'=>true),
      'def' => array('type'=>'int', 'isNullable'=>true),
      'atk' => array('type'=>'int', 'isNullable'=>true),
      'magic' => array('type'=>'int', 'isNullable'=>true),
      'speed' => array('type'=>'int', 'isNullable'=>true),
      'gold' => array('type'=>'int', 'isNullable'=>true)
    );

    public $id_chest;
    public $name;
    public $def;
    public $life;
    public $magic;
    public $speed;
    public $gold;

    public $isLocked = true; // mettre a true

  }
