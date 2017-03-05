<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminUserController">Return</a>
    <h1>User view</h1>
    <form action="index.php?controller=AdminUserController&update=1" method="post">
      <?php if ($user->id_user): ?>
          <input type="hidden" name="id_user" value="<?= $user->id_user ?>"/>
      <?php endif?>
      <input type="text" name="lastname" value="<?= $user->lastname ?>"/>
      <input type="text" name="firstname" value="<?= $user->firstname ?>"/>
      <input type="text" name="pseudo" value="<?= $user->pseudo ?>"/>
      <input type="text" name="email" value="<?= $user->email ?>"/>
      <input type="text" name="pass" value="<?= $user->pass ?>"/>
      <input type="textarea" name="description" value="<?= $user->description ?>"/>
      Admin
      <input type="radio" name="admin" value="1"<?= $user->admin ? 'checked' : false ?>/>yes
      <input type="radio" name="admin" value="0" <?= !$user->admin ? 'checked' : false ?>/>no

      <button type="submit">Update</button>
    </form>
    <a href="index.php?controller=AdminUserController&delete=1&id_user=<?= $user->id_user ?>">Delete</a>
  </body>
</html>
