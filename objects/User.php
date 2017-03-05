<?php

  class User extends ObjectCore
  {
    public $table = 'user';
    public $identifier = 'id_user';
    public $definition = array(
      'lastname' => array('type'=>'string', 'length'=>45),
      'firstname' => array('type'=>'string', 'length'=>45),
      'pseudo' => array('type'=>'string', 'length'=>45),
      'email' => array('type'=>'string', 'length'=>45),
      'description' => array('type'=>'string', 'isNullable'=>true),
      'pass' => array('type'=>'string'),
      'uniqid' => array('type'=>'string', 'length'=>13, 'isNullable'=>true),
      'admin' => array('type'=>'boolean', 'isNullable'=>true)
    );

    public $id_user;
    public $lastname;
    public $firstname;
    public $pseudo;
    public $email;
    public $description;
    public $pass;
    public $uniqid;

    // public function __construct($id_user = null)
    // {
    //   if ($id_user != null) {
    //     $user = self::getById($id_user);
    //     if ($user) {
    //       $this->id_user = $user['id_user'];
    //       $this->lastname = $user['lastname'];
    //       $this->firstname = $user['firstname'];
    //       $this->pseudo = $user['pseudo'];
    //       $this->email = $user['email'];
    //       $this->description = $user['description'];
    //       $this->pass = $user['pass'];
    //       $this->uniqid = $user['uniqid'];
    //       $this->admin = $user['admin'];
    //       return true;
    //     }
    //     return false;
    //   }
    // }

    public function newConnection()
    {
      $this->uniqid = uniqid();
      $this->update();
      $_SESSION['uniqid'] = $this->uniqid;
      $_SESSION['id_user'] = $this->id_user;
      return true;
    }

  }
