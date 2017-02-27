<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'nav.php' ?>
    <h1>Level List</h1>
    <a href="index.php?controller=AdminLevelController&create=1">create</a>
    <ul>
      <?php
      if (!empty($levels)) {
        foreach ($levels as $level) {
          echo '<li><a href="index.php?controller=AdminLevelController&view=1&id_level='.$level['id_level'].'">'.$level['name'].'</a></li>';
        }
      }
      ?>
    </ul>
  </body>
</html>
