<?php

  class Character extends ObjectCore
  {
    public $table = 'character_';
    public $identifier = 'id_character';
    public $definition = array(
      'name' => array('type'=>'varchar', 'length'=>45),
      'life' => array('type'=>'int'),
      'def' => array('type'=>'int'),
      'atk' => array('type'=>'int'),
      'magic' => array('type'=>'int', 'isNullable'=>true),
      'speed' => array('type'=>'int'),
      'monster' => array('type'=>'boolean', 'isNullable'=>true),
      'hero' => array('type'=>'boolean', 'isNullable'=>true)
    );

    public $id_character;
    public $name;
    public $life;
    public $def;
    public $atk;
    public $magic;
    public $speed;
    public $monster;
    public $hero;

    
    // public function __construct($id_user = null)
    // {
    //   if ($id_user != null) {
    //     $user = $this->getById($id_user);
    //     if ($user) {
    //       $this->id_character = $user['id_character'];
    //       $this->name = $user['name'];
    //       $this->life = $user['life'];
    //       $this->def = $user['def'];
    //       $this->atk = $user['atk'];
    //       $this->magic = $user['magic'];
    //       $this->speed = $user['speed'];
    //       return true;
    //     }
    //     return false;
    //   }
    // }

  }
