<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'nav.php' ?>
    <h1>User List</h1>
    <a href="index.php?controller=AdminUserController&create=1">create</a>
    <ul>
      <?php
        foreach ($users as $user) {
          echo '<li><a href="index.php?controller=AdminUserController&view=1&id_user='.$user['id_user'].'">'.$user['lastname'].'</a></li>';
        }
      ?>
    </ul>
  </body>
</html>
