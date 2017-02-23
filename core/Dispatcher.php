<?php

  class Dispatcher {

      public static function dispatch()
      {
        $niveau = null;
        $gold = null;

        if (self::isConnected()) {
          $niveau = new Niveau();
          $choices = array(
            'observer' => 1,
            'fuir' => 0,
            'attaquer' => 0,
            'ouvrirCoffre' => 0,
            'defendre ' => 0,
            'avancer ' => 0
          );

          if (isset($_SESSION['context']) && !empty($_SESSION['context'])) {
            $context = unserialize($_SESSION['context']);
          } else if (isset($_GET['hero']) && !empty($_GET['hero'])){

              $hero = new Hero($_GET['hero']);
              echo 'vous êtes :'.$hero->nom.'</br>';
              $niveau = new Niveau();

              $context = new Context();
              $context->niveau = $niveau;
              $context->hero = $hero;
              $_SESSION['context'] = serialize($context);
              header('Location: index.php');
          } else {
            $heros = array(
              new Hero(1),
              new Hero(2),
              new Hero(3)
            );
            ob_start();
            include 'views/joueur.php';
            $html = ob_get_clean();
            echo $html;
            die();
          }



          // update
          if (isset($_GET['choice']) && !empty($_GET['choice']) && $_GET['choice'] == 'observer') {
            $context->niveau->discovered = true;
          }



          //$_SESSION['context']





          ob_start();
          include 'views/plateau.php';
          $html = ob_get_clean();
          echo $html;
        } else {
          ob_start();
          include 'views/connexion.php';
          $html = ob_get_clean();
          echo $html;
        }
      }

      public static function isConnected()
      {
        if (isset($_SESSION['uniqid']) && !empty($_SESSION['uniqid'])) {
          $result = Db::getInstance()->select('profil', '*', 'uniqid = "'.$_SESSION['uniqid'].'"');
          if (!empty($result)) {
              return true;
          }
        }

        if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == 'connexion') {
          if (isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['pass']) && !empty($_GET['pass'])){
            $result = Db::getInstance()->select('profil', '*', 'email = "'.$_GET['email'].'" && pass = "'.$_GET['pass'].'"');
            if ($result) {
              $uniqid = uniqid();
              Db::getInstance()->update('profil',array('uniqid' => $uniqid), 'id = "'.$result[0]['id'].'"');
              $_SESSION['uniqid'] = $uniqid;
              return true;
            }
          }
        } else if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == 'inscription') {
          if (isset($_GET['pseudo']) && !empty($_GET['pseudo'])
            && isset($_GET['nom']) && !empty($_GET['nom'])
            && isset($_GET['prenom']) && !empty($_GET['prenom'])
            && isset($_GET['email']) && !empty($_GET['email'])
            && isset($_GET['descriptif']) && !empty($_GET['descriptif'])
            && isset($_GET['pass']) && !empty($_GET['pass'])
          ){
            $result = Db::getInstance()->insert('profil', array(
              'pseudo' => $_GET['pseudo'],
              'nom' => $_GET['nom'],
              'prenom' => $_GET['prenom'],
              'email' => $_GET['email'],
              'pass' => $_GET['pass'],
            ));

            $uniqid = uniqid();
            Db::getInstance()->update('profil',array('uniqid' => $uniqid), 'email = "'.$_GET['email'].'"');
            $_SESSION['uniqid'] = $uniqid;
            return true;
          }
        }

        return false;
      }

  }

?>
