<?php

  class Game
  {
    public $level;
    public $hero;
    public $actionDefCount;

    public function __construct($id_hero = null)
    {
      //$this->hero = new Hero($id_hero);
      $this->initGame();
    }

    public function initGame()
    {
      //$this->gameSetting = new GameSetting();
      $this->actionDefCount = 0;
      $listLevel = array(12, 13); // Get level by position
      $this->levels = array();
      foreach ($listLevel as $id_level) {
        $this->levels[] = new Level($id_level);
      }
      $this->loadLevel(0);
    }

    public function loadLevel($num_level)
    {
      $this->level = $this->levels[$num_level]; //$this->gameSetting->level($num_level);
      $this->monsters = array();
      $this->chests = array();
      for ($i=0; $i<$this->level->nb_monster; $i++) {
        $this->monsters[] = new Monster($this->level->type_monster[rand(0, count($this->level->type_monster)-1)]);
      }
      for ($i=0; $i<$this->level->nb_chest; $i++) {
        $this->chests[] = new Chest($this->level->type_chest[rand(0, count($this->level->type_chest)-1)]);
      }
    }

    public function update()
    {
      if (Tools::getValue('observe')) {
        $this->level->view = true;
      }
      if (Tools::getValue('defense')) {
        $this->hero->def += 10; // $this->gameSetting->bonusDef;
        $this->actionDefCount++;
        if ($this->actionDefCount == 2) {
          $this->level->view = false;
        }
      }
      if (Tools::getValue('attack') && $this->level->view) {

      }
    }

    public function action()
    {
    //   if (atk) {
    //     $monstre->life -= $hero->atk - $monstre->def;
    //     $hero->life -= $monstre->atk - $hero->def;
    //   }
    //   if (def) {
    //       $hero->def += $bonusDef;
    //   }
    //   if (view) {
    //
    //   }
    }


  }
