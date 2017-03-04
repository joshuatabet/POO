<?php

  class GameController extends FrontController
  {
    public function index()
    {
      if (Tools::isValid('reset')) {
        unset($_SESSION['game']);
      }
      if (Tools::isValid('menu')) {
        $this->render('gameMenu');
      }
      if (Tools::isValidSession('game')) {
        $game = unserialize(Tools::getValueSession('game'));
        if (Tools::isValid('choiceHero') && Tools::isValid('id_hero')) {
          $game->hero = new Hero(Tools::getValue('id_hero'));
        }
        if (!$game->update()) {
            $this->assign('game', $game);
            $this->render('endGame');
        }
      } else {
        $game = new Game();
        $_SESSION['game'] = serialize($game);
        $hero = new Hero();
        $heros = $hero->getAll();
        $this->assign('heros', $heros);
        $this->render('choiceHero');
      }
      // traitement des actions
      // mise a jour de la game

      // foreach ($game->chests as &$chest) {
      //   $chest->isLocked = false;
      // }
      $_SESSION['game'] = serialize($game);

      $this->assign('game', $game);
      $this->render('game');
    }
  }
