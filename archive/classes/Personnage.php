<?php

  abstract class Personnage
  {
    public $id;
    public $nom;
    public $vie;
    public $defense;
    public $attaque;
    public $vitesse;
    public $magie;
    public $stat;

    public function __construct($id, $nom, $vie, $defense, $attaque, $vitesse, $magie, $stat) {
      $this->id = $id;
      $this->nom = $nom;
      $this->vie = $vie;
      $this->defense = $defense;
      $this->attaque = $attaque;
      $this->vitesse = $vitesse;
      $this->magie = $magie;
      $this->stat = $stat;
    }
  }

?>
