<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminLevelController">Retour</a>
    <h1>Level create</h1>
    <form action="index.php?controller=AdminLevelController&create=1" method="post">
      <input type="text" name="name" placeholder="name"/>
      <input type="number" name="nb_chest" placeholder="nb_chest"/>
      <input type="number" name="nb_monster" placeholder="nb_monster"/>
      <?php if ($monsters): ?>
        <?php foreach ($monsters as $monster): ?>
          <input type="checkbox" name="type_monster[]" value="<?= $monster['id_character'] ?>"/><?= $monster['name'] ?>
        <?php endforeach; ?>
      <?php endif; ?>
      <button type="submit">Create</button>
    </form>
  </body>
</html>
