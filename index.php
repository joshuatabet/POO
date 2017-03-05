<?php
  session_start();
  //require 'config/config.php';
  require 'config/database.php';
  require 'core/Autoloader.php';
  Autoloader::register();

  Dispatcher::route();
?>
