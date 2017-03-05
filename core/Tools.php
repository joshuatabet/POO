<?php

  class Tools
  {

    public static function isSubmit($submit)
    {
      if (self::isValid($submit)) {
        return true;
      }
      return false;
    }

    public static function isValid($name)
    {
      if (isset($_GET[$name]) && !empty($_GET[$name])) {
        return 'get';
      } else if (isset($_POST[$name]) && !empty($_POST[$name])) {
        return 'post';
      }
      return false;
    }

    public static function getValue($name)
    {
      if (self::isValid($name) == 'get') {
        return $_GET[$name];
      } else if (self::isValid($name) == 'post') {
        return $_POST[$name];
      }
      return false;
    }

    public static function isValidSession($name)
    {
      if (isset($_SESSION[$name]) && !empty($_SESSION[$name])) {
        return $_SESSION[$name];
      }
      return false;
    }

    public static function getValueSession($name)
    {
      if (self::isValidSession($name)) {
        return $_SESSION[$name];
      }
      return false;
    }

  }
