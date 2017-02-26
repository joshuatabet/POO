<?php

  abstract class EntityCore
  {

    public $table;
    public $definitions;

    public function add()
    {
      $fields = array();
      foreach ($this->definitions as $field) {
        $fields[$field] = $this->$field;
      }

      Db::getInstance()->insert($this->table, $fields);
    }
    public function load()
    {

    }
    public function update()
    {

    }

    public function delete()
    {

    }

    public function getAll()
    {
      return Db::getInstance()->select($this->table, '*');
    }

    public function getById($id)
    {
      $result = Db::getInstance()->select($this->table, '*', $this->identifier.'="'.$id.'"');
      return (!empty($result) ? $result[0] : false);
    }

  }
