<?php

  class Hero extends Personnage {
    public $pseudo;

    public function __construct($id = null) {
      if ($id) {
        $result = Db::getInstance()->select('heros', '*', 'id = "'.$id.'"');
        if (!empty($result)) {
          $result = $result[0];
        } else {
          echo 'error : hero introuvable';
        }
        parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie']);
      }
    }


  }

?>
