<?php

  class Game
  {
    public $level;
    public $hero;
    public $actionDefCount = 0;
    public $num_level = 0;
    public $levels = array();

    public function __construct($id_hero = null)
    {
      //$this->hero = new Hero($id_hero);
      $this->initGame();
    }

    public function initGame()
    {
      //$this->gameSetting = new GameSetting();

      $level = new Level();
      $listLevel = $level->getAllOrdered();
      foreach ($listLevel as $level) {
        $this->levels[] = new Level($level['id_level']);
      }
      $this->loadLevel(0);
    }

    public function loadLevel($num_level)
    {
      if (!array_key_exists($num_level, $this->levels)) {
          return false;
      }
      $this->level = $this->levels[$num_level]; //$this->gameSetting->level($num_level);

      for ($i=0; $i<$this->level->nb_monster; $i++) {
        $this->level->monsters[] = new Monster($this->level->type_monster[rand(0, count($this->level->type_monster)-1)]);
      }
      for ($i=0; $i<$this->level->nb_chest; $i++) {
        $this->level->chests[] = new Chest($this->level->type_chest[rand(0, count($this->level->type_chest)-1)]);
      }

      // trie des monstres en fonction de sa vitesse
      $this->level->sortMonsterBySpeed();

      return true;
    }

    public function update()
    {
      if (Tools::getValue('escape')) {
        $this->hero->life -= 10; // $gameSetting->lifeEscape
        if ($this->hero->life <= 0) {
          die ('Game Over');
        }
        $this->num_level ++;
        if (!$this->loadLevel($this->num_level)) {
          return false;
        }
      }
      if (Tools::getValue('nextLevel')) {
        $this->num_level ++;
        if (!$this->loadLevel($this->num_level)) {
          return false;
        }
      }
      if (Tools::getValue('observe')) {
        $this->level->view = true;
      }
      if (Tools::getValue('defend')) {
        $this->hero->def += 10; // $this->gameSetting->bonusDef;
        $this->hero->nb_click_defend++;
        if ($this->hero->nb_click_defend == 2) {
          $this->hero->nb_click_defend = 0;
          $this->level->view = false;
        }
      }
      if (Tools::getValue('attack') && $this->level->view && $this->level->getNbAliveMonster() > 0) {
        if (Tools::getValue('atk')) {
          $degat = $this->hero->getAtk();
        }
        if (Tools::getValue('magic')) {
          $degat = $this->hero->getMagic();
        }
        if ($this->diceScore() == 'fail') {
          $degat = $degat * 0.1;
        } else if ($this->diceScore() == 'normal') {
          $degat = $degat * 1;
        } else if ($this->diceScore() == 'success') {
          $degat = $degat * 1.5;
        }
      }

      if (Tools::getValue('openChest') && $this->level->getNbAliveMonster() == 0 && $this->level->getNbLockedChest() >= 0) {
        $this->level->unlockChest();
      }

      if (Tools::getValue('getChest') && !empty($this->level->chests[Tools::getValue('num_chest')])) {
        $this->hero->setChest($this->level->chests[Tools::getValue('num_chest')]);
      }

      if ($this->level->getNbAliveMonster() > 0)
      {
      }

      if ($this->hero->life <= 0) {
        $this->hero->life = 0;
        return false;
      }

      return true;

    }

    public function diceScore()
    {
      $nb = mt_rand(0,20);
      if ($nb <= 5) {
        return 'fail';
      } else if ($nb <= 15) {
        return 'normal';
      } else {
        return 'success';
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
