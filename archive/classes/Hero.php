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
          parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
      }
    }

      public function statistique(){
          $des = mt_rand(0, 20);
          echo 'Votre lancé de dés a donné :'.$des.'<br/>';

          if($this->id == 1){

              if ($des < 6){
                  $result['defense']=($this->defense)-($this->stat);
                  $result['attaque']=($this->attaque)-($this->stat);
                  $result['magie']= ($this->magie);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous perdez des points !';

              }elseif ($des > 14){
                  $result['defense']=($this->defense)+($this->stat);
                  $result['attaque']=($this->attaque)+($this->stat);
                  $result['magie']= ($this->magie);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous gangez des points !';
              }else {
                  echo 'vous gardez vos points !';
              }

          }elseif($this->id == 2) {

              if ($des < 6){
                  $result['defense']=($this->defense)-($this->stat);
                  $result['attaque']=($this->attaque);
                  $result['magie']= ($this->magie)-($this->stat);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous perdez des points !';

              }elseif ($des > 14){
                  $result['defense']=($this->defense)+($this->stat);
                  $result['attaque']=($this->attaque);
                  $result['magie']= ($this->magie)+($this->stat);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous gangez des points !';
              }else {
                  echo 'vous gardez vos points !';
              }

          }else{

              if ($des < 6){
                  $result['defense']=($this->defense)-($this->stat);
                  $result['attaque']=($this->attaque)-($this->stat);
                  $result['magie']= ($this->magie)-($this->stat);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous perdez des points !';

              }elseif ($des > 14){
                  $result['defense']=($this->defense)+($this->stat);
                  $result['attaque']=($this->attaque)+($this->stat);
                  $result['magie']= ($this->magie)+($this->stat);
                  $result['id']= ($this->id);
                  $result['nom']= ($this->nom);
                  $result['vie']= ($this->vie);
                  $result['vitesse']= ($this->vitesse);
                  parent::__construct($result['id'], $result['nom'], $result['vie'], $result['defense'], $result['attaque'], $result['vitesse'], $result['magie'], $result['stat']);
                  echo 'vous gangez des points !';
              }else {
                  echo 'vous gardez vos points !';
              }
          }
      }
  }

?>
