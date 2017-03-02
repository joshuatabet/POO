<?php
  class Db
  {

    public static $pdo;
    public static $Db;

    public function __construct() {
      try {
          self::$pdo = new PDO('mysql:host='._DB_HOST_.';dbname='._DB_NAME_, _DB_USER_, _DB_PASSWORD_, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
      }
      catch (EXCEPTION $e){
          echo 'ERREUR:' .$e->getMessage().'<br>';
          echo 'N°:'.$e->getCode();
      }
    }

    public static function getInstance() {
      if (!self::$pdo) {
        self::$Db = new Db();
      }
      return self::$Db;
    }

    public function execute($sql) {
      $result = self::$pdo->query($sql);
      return $result;
    }

    public function insert($table, $values) {
      $sql = 'INSERT INTO '.$table.' (';

      foreach ($values as $fieldName => $value) {
         $sql .= $fieldName.',';
      }

      $sql = rtrim($sql, ',');
      $sql .= ') VALUES (';

      foreach ($values as $fieldName => $value) {
         $sql .= '"'.$value.'",';
      }

      $sql = rtrim($sql, ',');
      $sql .= ')';
      var_dump($sql);
      $result = self::$pdo->query($sql);
      if (!empty($result)) {
          $result = self::$pdo->lastInsertId();
      }

      return $result;
    }

    public function select($table, $fields, $where = '') {
      $sql = 'SELECT ';

      if (is_array($fields)) {
        foreach ($fields as $field) {
          $sql .= $field.',';
        }
        $sql = rtrim($sql, ',');
      } else {
        $sql .= $fields;
      }

      $sql .= ' FROM '.$table.' WHERE 1 = 1 '.($where ? 'AND '.$where : '');
      $result = self::$pdo->query($sql);
      if (!empty($result)) {
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
      }

      return $result;
    }

    public function update($table, $values, $where) {
      $sql = 'UPDATE '.$table.' SET ';

      foreach ($values as $fieldName => $value) {
         $sql .= $fieldName.' = "'.$value.'",';
      }

      $sql = rtrim($sql, ',');
      $sql .= ' WHERE '.$where;
      $result = self::$pdo->query($sql);
      
      return $result;
    }

    public function delete($table, $where) {
      $sql = 'DELETE FROM '.$table.' WHERE '.$where;
      $result = self::$pdo->query($sql);

      return $result;
    }

  }

?>
