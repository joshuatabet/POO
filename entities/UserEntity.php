<?php

  class UserEntity extends EntityCore
  {

    public $table = 'user';
    public $identifier = 'id_user';
    public $definitions = array(
      'nom',
      'prenom',
      'pseudo',
      'email',
      'descriptif',
      'pass',
      'uniqid'
    );  

  }
