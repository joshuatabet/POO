<?php

  class User extends ObjectCore
  {
    public $table = 'user';
    public $identifier = 'id_user';
    public $definition = array(
      'nom' => array('type'=>'string', 'length'=>45),
      'prenom' => array('type'=>'string', 'length'=>45),
      'pseudo' => array('type'=>'string', 'length'=>45),
      'email' => array('type'=>'string', 'length'=>45),
      'descriptif' => array('type'=>'string', 'isNullable'=>true),
      'pass' => array('type'=>'string'),
      'uniqid' => array('type'=>'string', 'length'=>13, 'isNullable'=>true),
      'admin' => array('type'=>'boolean', 'isNullable'=>true)
    );

    public $id_user;
    public $nom;
    public $prenom;
    public $pseudo;
    public $email;
    public $descriptif;
    public $pass;
    public $uniqid;

    public function __construct($id_user = null)
    {
      if ($id_user != null) {
        $user = self::getById($id_user);
        if ($user) {
          $this->id_user = $user['id_user'];
          $this->nom = $user['nom'];
          $this->prenom = $user['prenom'];
          $this->pseudo = $user['pseudo'];
          $this->email = $user['email'];
          $this->descriptif = $user['descriptif'];
          $this->pass = $user['pass'];
          $this->uniqid = $user['uniqid'];
          $this->admin = $user['admin'];
          return true;
        }
        return false;
      }
    }

    public function newConnexion()
    {
      $this->uniqid = uniqid();
      $this->update();
      $_SESSION['uniqid'] = $this->uniqid;
      $_SESSION['id_user'] = $this->id_user;
      return true;
    }

  }
