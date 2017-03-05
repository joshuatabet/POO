<?php

  abstract class ObjectCore
  {
    public $table;
    public $identifier;
    public $definition;

    public function __construct($id = null)
    {
      if ($id != null) {
        $row = $this->getById($id);
        if ($row) {
          foreach ($row as $key => $value) {
            $this->$key = $value;
          }
          return true;
        }
        return false;
      }
    }

    public function create()
    {
      // parcour de la definition pour valider les valeurs avant insert
      if (!$this->verifyPropertyByDefinition()) {
        return false;
      }

      // creation du tableau de data contenant les propriété définie dans la
      // definition de l'objet
      $data = $this->createDataArray();
      return Db::getInstance()->insert($this->table, $data);
    }

    public function update()
    {
      if (!$this->verifyPropertyByDefinition()) {
        return false;
      }

      $data = $this->createDataArray();
      return Db::getInstance()->update($this->table, $data, $this->identifier.' = "'.$this->{$this->identifier}.'"');
    }

    public function delete()
    {
      if ($this->{$this->identifier}) {
        return Db::getInstance()->delete($this->table, $this->identifier.' = '.$this->{$this->identifier});
      }
      return false;
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

    // verifie la validité des propriétés de l'objet en fonction de la
    // definition
    public function verifyPropertyByDefinition()
    {
      // verifie si id_user est bien un nombre
      if ($this->{$this->identifier} * 1 != $this->{$this->identifier}) {
        return false;
      }
      $this->{$this->identifier} *= 1;
      foreach ($this->definition as $field_name => $field) {
        if (array_key_exists('isNullable', $field) && $field['isNullable'] == true) {
          if (empty($this->$field_name) && array_key_exists('type', $field) && ($field['type'] == 'boolean' || $field['type'] == 'int')) {
            $this->$field_name = '0';
          } else if (empty($this->$field_name)) {
            $this->$field_name = '';
            continue;
          }
        }
        if (array_key_exists('type',$field)) {
          switch ($field['type']) {
              case 'int':
                if ($this->$field_name * 1 != $this->$field_name) {
                  return false;
                }
                $this->$field_name *= 1;
              break;
              case 'string':
                if (gettype($this->$field_name) != 'string') {
                  return false;
                }
              break;
              case 'boolean':
                  if ( $this->$field_name != 1
                    && $this->$field_name != 0
                    && $this->$field_name != '1'
                    && $this->$field_name != '0'
                  ) {
                    return false;
                  }
              break;
          }
        }

        if (array_key_exists('length',$field)) {
          if (strlen($this->$field_name) > $field['length']) {
            return false;
          }
        }
      }
      return true;
    }

    // retourne un tableau contenant les noms et valeurs de propriété de
    // l'objet en fonction de la definition
    private function createDataArray()
    {
      $data = array();
      foreach ($this->definition as $field_name => $field) {
        $data[$field_name] = $this->$field_name;
      }
      return $data;
    }

    public function load()
    {
      $where = '';
      foreach ($this->definition as $field_name => $field) {
        if (!empty($this->$field_name)) {
          $where .= $field_name. '= "'.$this->$field_name.'" AND ';
        }
      }
      $where = rtrim($where, 'AND ');
      $result = Db::getInstance()->select($this->table, '*', $where);

      if (count($result) == 1) {
        $this->{$this->identifier} = $result[0][$this->identifier];
        foreach ($this->definition as $field_name => $field) {
          $this->$field_name = $result[0][$field_name];
        }
        return true;
      }
      return false;
    }

  }
