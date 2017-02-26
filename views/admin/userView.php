<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminUserController">Retour</a>
    <h1>User view</h1>
    <form action="index.php?controller=AdminUserController&update=1" method="post">
      <?php if ($user->id_user): ?>
          <input type="hidden" name="id_user" value="<?= $user->id_user ?>"/>
      <?php endif?>
      <input type="text" name="nom" value="<?= $user->nom ?>"/>
      <input type="text" name="prenom" value="<?= $user->prenom ?>"/>
      <input type="text" name="pseudo" value="<?= $user->pseudo ?>"/>
      <input type="text" name="email" value="<?= $user->email ?>"/>
      <input type="text" name="pass" value="<?= $user->pass ?>"/>
      <input type="textarea" name="descriptif" value="<?= $user->descriptif ?>"/>
      Admin
      <input type="radio" name="admin" value="1"<?= $user->admin ? 'checked' : false ?>/>oui
      <input type="radio" name="admin" value="0" <?= !$user->admin ? 'checked' : false ?>/>non

      <button type="submit">Update</button>
    </form>
  </body>
</html>
