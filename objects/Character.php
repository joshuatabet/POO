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
      'hero' => array('type'=>'boolean', 'isNullable'=>true),
      'variation_atk' => array('type'=>'int', 'isNullable'=>true),
      'variation_def' => array('type'=>'int', 'isNullable'=>true),
      'variation_magic' => array('type'=>'int', 'isNullable'=>true),
      'variation_speed' => array('type'=>'int', 'isNullable'=>true)
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
    public $variation_atk;
    public $variation_def;
    public $variation_magic;
    public $variation_speed;

    // public function __construct($id_character = null)
    // {
    //   if ($id_character != null) {
    //     $row = $this->getById($id);
    //     if ($row) {
    //       foreach ($row as $key => $value) {
    //         $this->$key = $value;
    //       }
    //       return true;
    //     }
    //     return false;
    //   }
    // }
    public function calcVariation()
    {
      $this->atk += floor(mt_rand(-(int)$this->variation_atk, (int)$this->variation_atk));
      $this->def += floor(mt_rand(-(int)$this->variation_def, (int)$this->variation_def));
      $this->magic += floor(mt_rand(-(int)$this->variation_magic, (int)$this->variation_magic));
      $this->speed += floor(mt_rand(-(int)$this->variation_speed, (int)$this->variation_speed));
    }
  }
