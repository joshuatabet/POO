<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminLevelController">Return</a>
    <h1>Level view</h1>
    <form action="index.php?controller=AdminLevelController&update=1" method="post">

      <?php if ($level->id_level): ?>
          <input type="hidden" name="id_level" value="<?= $level->id_level ?>"/>
      <?php endif?>

      <input type="text" name="name" value="<?= $level->name ?>"/>
      <input type="number" name="nb_chest" value="<?= $level->nb_chest ?>"/>
      <input type="number" name="nb_monster" value="<?= $level->nb_monster ?>"/>

      <?php if (!empty($monsters)): ?>
        <?php foreach($monsters as $monster): ?>
          <input
            type="checkbox"
            name="type_monster[]"
            value="<?= $monster['id_character'] ?>"
            <?= in_array($monster['id_character'], $level->type_monster) ? 'checked' : ''?>
          />
          <?= $monster['name'] ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($chests)): ?>
        <?php foreach($chests as $chest): ?>
          <input
            type="checkbox"
            name="type_chest[]"
            value="<?= $chest['id_chest'] ?>"
            <?= in_array($chest['id_chest'], $level->type_chest) ? 'checked' : ''?>
          />
          <?= $chest['name'] ?>
        <?php endforeach; ?>
      <?php endif; ?>

      <button type="submit">Update</button>
    </form>

    <a href="index.php?controller=AdminLevelController&delete=1&id_level=<?= $level->id_level ?>">Delete</a>
  </body>
</html>
