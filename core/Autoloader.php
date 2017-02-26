<?php

  class Autoloader
  {

    static $list_dir = array(
      'core/',
      'controllers/',
      'controllers/front/',
      'controllers/admin/',
      'classes/',
      'entities/',
      'objects/'
    );

    static function autoload($class_name)
    {
      foreach (self::$list_dir as $path) {
        if (is_file($path.$class_name.'.php')) {
          require $path.$class_name.'.php';
        }
      }
    }

    static function register()
    {
      spl_autoload_register(array(__CLASS__, 'autoload'));
    }

  }
