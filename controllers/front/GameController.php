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
          $game->hero->calcVariation();
        }
        $this->assign('game', $game);
        $update = $game->update();
        switch ((string)$update) {
          case '1':
            $_SESSION['game'] = serialize($game);
            $this->render('game');
          break;
          case 'endGame':
            $this->render('endGame');
          break;
          case 'gameOver':
            $this->render('gameOver');
          break;
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

    }
  }
