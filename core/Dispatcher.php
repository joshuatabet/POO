<?php

  class Dispatcher {

      public static function dispatch()
      {
        $choices = array('observer' => 0);
        $niveau = null;
        $nb_monstre = null;
        $nb_coffre = null;
        $niveau = null;
        $gold = null;

        if (self::isConnected()) {

          // $context = (isset($_SESSION['context']) && !empty($_SESSION['contect'])) ? $_SESSION['context'] : false;
          //
          // if (!$context) {
          //   $context = array(
          //     'niveau' = new Niveau();
          //   );
          // }
          //
          //
          // $choices = array(
          //   'atk' => 1;
          //   'deff' => 1;
          // )
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
          $result = Db::getInstance()->select('profil', '*', 'WHERE uniqid = "'.$_SESSION['uniqid'].'"');
          if (!empty($result)) {
              return true;
          }
        }

        if (isset($_GET['type']) && !empty($_GET['type']) && $_GET['type'] == 'connexion') {
          if (isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['pass']) && !empty($_GET['pass'])){
            $result = Db::getInstance()->select('profil', '*', 'WHERE email = "'.$_GET['email'].'" && pass = "'.$_GET['pass'].'"');
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
              'descriptif' => $_GET['descriptif'],
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
