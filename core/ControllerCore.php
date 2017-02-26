<?php

  abstract class ControllerCore
  {
    protected $assign = array();

    // fonction de rendu de la vue
    public function render($page_name)
    {
      // si des variables on été envoyé à la vue, on les charge
      if (!empty($this->assign)) {
        extract($this->assign);
      }

      // si le fichier existe, on l'inclu, sinon erreur
      if (is_file('views/'.$page_name.'.php')) {
        include 'views/'.$page_name.'.php';
        die();
      } else {
        echo 'Error: '.$page_name.'.php introuvable dans views/'.$page_name.'.php';
      }
    }

    // fonction d'assignement de variable à la vue
    public function assign($name, $value = null)
    {
        if (is_array($name)) {
          foreach ($name as $key => $value) {
            $this->assign[$key] = $value;
          }
        } else {
          $this->assign[$name] = $value;
        }
    }
  }
