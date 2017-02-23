<?php

  class Niveau {
    public $nom;
    public $coffre;
    public $monstre;
    public $discovered = false;

    public function __construct($id = null) {
      if ($id == null) {
        $id = 1;
      }

      $result = Db::getInstance()->select('niveau', '*', 'id = "'.$id.'"');
      if (!empty($result)) {
        $result = $result[0];
      } else {
        echo 'error : niveau introuvable';
      }
      $this->id = $result['id'];
      $this->nom = $result['nom'];
      $this->coffre = $result['coffre'];
      $this->monstre = $result['monstre'];
    }
    public function get($nom) {
      if ($nom == 'coffre' && $this->discovered == true) {
        return $this->coffre;
      } else if ($nom == 'monstre' && $this->discovered == true) {
        return $this->monstre;
      }
      return '';
    }

  }

?>
