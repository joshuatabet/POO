<?php

  class GameController extends FrontController
  {
    public function index()
    {
      if (!Tools::isValidSession('hero')) {
        $hero = new Hero();
        $heros = $hero->getAll();
        $this->assign('heros', $heros);
        $this->render('choiceHero');
      }

      if (Tools::isValidSession('game')) {
        $game = unserialize(Tools::getValueSession('game'));
      } else {
        $game = new Game();
      }

      
      // traitement des actions
      // mise a jour de la game

      $this->render('game');
    }
  }
