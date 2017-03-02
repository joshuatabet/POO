<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'nav.php' ?>
    <h1>Chest List</h1>
    <a href="index.php?controller=AdminChestController&create=1">create</a>
    <ul>
      <?php
      if (!empty($chests)) {
        foreach ($chests as $chest) {
          echo '<li><a href="index.php?controller=AdminChestController&view=1&id_chest='.$chest['id_chest'].'">'.$chest['name'].'</a></li>';
        }
      }
      ?>
    </ul>
  </body>
</html>
