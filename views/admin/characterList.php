<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'nav.php' ?>
    <h1>Character List</h1>
    <a href="index.php?controller=AdminCharacterController&create=1">create</a>
    <ul>
      <?php
      if (!empty($characters)) {
        foreach ($characters as $character) {
          echo '<li><a href="index.php?controller=AdminCharacterController&view=1&id_character='.$character['id_character'].'">'.$character['name'].'</a></li>';
        }
      }
      ?>
    </ul>
  </body>
</html>
