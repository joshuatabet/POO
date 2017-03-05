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
      $this->level->load();
      for ($i=0; $i<$this->level->nb_monster; $i++) {
        $this->level->monsters[$i] = new Monster($this->level->type_monster[rand(0, count($this->level->type_monster)-1)]);
        $this->level->monsters[$i]->calcVariation();
      }
      for ($i=0; $i<$this->level->nb_chest; $i++) {
        $this->level->chests[$i] = new Chest($this->level->type_chest[rand(0, count($this->level->type_chest)-1)]);
        $this->level->chests[$i]->calcVariation();
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
          return 'gameOver';
        }
        $this->num_level ++;
        if (!$this->loadLevel($this->num_level)) {
          return 'endGame';
        }
      }

      if (Tools::getValue('nextLevel')) {
        $this->num_level ++;
        if (!$this->loadLevel($this->num_level)) {
          return 'endGame';
        }
      }

      if (Tools::getValue('observe')) {
        $this->level->view = true;
      }

      if (Tools::getValue('defend')) {
        $this->hero->nb_click_defend ++;
        if ($this->hero->nb_click_defend >= 2) {
          $this->hero->nb_click_defend = 0;
          $this->level->view = 0;
        }
      }

      if (Tools::getValue('attack') && $this->level->view && $this->level->getNbAliveMonster() > 0) {
        if (Tools::getValue('atk')) {
          $degat = $this->hero->getAtk();
        }
        if (Tools::getValue('magic')) {
          $degat = $this->hero->getMagic();
        }
        $diceScore = $this->diceScore();
        if ($diceScore == 'fail') {
          $degat = floor($degat * 0.1);
        } else if ($diceScore == 'normal') { // facultatif, c'est juste a titre indicatif
          $degat = floor($degat * 1);
        } else if ($diceScore == 'success') {
          $degat = floor($degat * 1.5);
        }
      }

      if (Tools::getValue('openChest') && $this->level->getNbAliveMonster() == 0 && $this->level->getNbLockedChest() >= 0) {
        $this->level->unlockChest();
      }

      if (Tools::getValue('getChest')) {
        if (Tools::getValue('num_chest') == false) {
          $num_chest = 0;
        } else {
          $num_chest = Tools::getValue('num_chest');
        }
        if (!empty($this->level->chests[$num_chest])) {
          $this->hero->setChest($this->level->chests[$num_chest]);
          unset($this->level->chests[$num_chest]);
        }
      }

      //_______

      // gestion de la phase d'atk et de def
      if ($this->level->getNbAliveMonster() > 0)
      {
        $monster_action = $this->level->getMonsterAction();
        if ($monster_action == 'atk_atk' || $monster_action == 'atk_magic') {
          $monster_degat = ($monster_action == 'atk_atk') ? $this->level->monsters[0]->atk : $this->level->monsters[0]->magic;
          $diceScore = $this->diceScore();
          if ($diceScore == 'fail') {
            $monster_degat = floor($monster_degat * 0.1);
          } else if ($diceScore == 'normal') { // facultatif
            $monster_degat = floor($monster_degat * 1);
          } else if ($diceScore == 'success'){
            $monster_degat = floor($monster_degat * 1.5);
          }
        }

        // hero atk , monster rien
        if (isset($degat) && !isset($monster_degat) && $monster_action != 'def') {
          $degat = max(0, ($degat - $this->level->monsters[0]->def));
          $this->level->monsters[0]->life -= $degat;
          if ($this->level->monsters[0]->life <= 0) {
            array_shift($this->level->monsters);
          }
        }
        // hero atk , monster atk
        if (isset($degat) && isset($monster_degat)) {
          $degat = max(0, ($degat - $this->level->monsters[0]->def));
          $monster_degat = max(0, ($monster_degat - $this->hero->def));
          if ($this->hero->speed < $this->level->monsters[0]->speed) { // si hero plus rapide
            $this->hero->life -= $monster_degat;
            if ($this->hero->life >= 0) {
              $this->level->monsters[0]->life -= $degat;
              if ($this->level->monsters[0]->life <= 0) {
                array_shift($this->level->monsters);
              }
            }
          } else {                                                    // si monster plus rapide
            $this->level->monsters[0]->life -= $degat;
            if ($this->level->monsters[0]->life >= 0) {
              $this->hero->life -= $monster_degat;
            } else {
              array_shift($this->level->monsters); // monster mort
            }
          }
        }
        // hero atk , monster def
        if (isset($degat) && $monster_action == 'def') {
          $degat = max( 0, ($degat - $this->level->monsters[0]->def * 2) ); // double des points de def
          $this->level->monsters[0]->life -= $degat;
          if ($this->level->monsters[0]->life <= 0) {
            array_shift($this->level->monsters); // monster mort
          }
        }
        // hero def , monster atk
        if (Tools::getValue('defend') && isset($monster_degat)) {
          $monster_degat = max(0, ($monster_degat - $this->hero->def * 2)); // double des points de def
          $this->hero->life -= $monster_degat;
        }
        // hero rien, monster atk
        if (isset($monster_degat)) {
          $this->hero->life -= $monster_degat;
        }
      }


      if ($this->hero->life <= 0) {
        $this->hero->life = 0;
        return 'gameOver';
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

  }
