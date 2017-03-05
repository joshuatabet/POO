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
      'gold' => array('type'=>'int', 'isNullable'=>true),
      'variation_life' => array('type'=>'int', 'isNullable'=>true),
      'variation_def' => array('type'=>'int', 'isNullable'=>true),
      'variation_atk' => array('type'=>'int', 'isNullable'=>true),
      'variation_magic' => array('type'=>'int', 'isNullable'=>true),
      'variation_speed' => array('type'=>'int', 'isNullable'=>true),
      'variation_gold' => array('type'=>'int', 'isNullable'=>true)
    );

    public $id_chest;
    public $name;
    public $life;
    public $def;
    public $atk;
    public $magic;
    public $speed;
    public $gold;
    public $variation_life;
    public $variation_def;
    public $variation_atk;
    public $variation_magic;
    public $variation_speed;
    public $variation_gold;

    public $isLocked = true; // mettre a true

    public function calcVariation()
    {
      $this->life += floor(mt_rand(-(int)$this->variation_life, (int)$this->variation_life));
      $this->atk += floor(mt_rand(-(int)$this->variation_atk, (int)$this->variation_atk));
      $this->def += floor(mt_rand(-(int)$this->variation_def, (int)$this->variation_def));
      $this->magic += floor(mt_rand(-(int)$this->variation_magic, (int)$this->variation_magic));
      $this->speed += floor(mt_rand(-(int)$this->variation_speed, (int)$this->variation_speed));
      $this->gold += floor(mt_rand(-(int)$this->variation_gold, (int)$this->variation_gold));
    }

  }
