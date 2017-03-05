<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminChestController">Return</a>
    <h1>Chest view</h1>
    <form action="index.php?controller=AdminChestController&update=1" method="post">
      <?php if ($chest->id_chest): ?>
          <input type="hidden" name="id_chest" value="<?= $chest->id_chest ?>"/>
      <?php endif?>
      <input type="text" name="name" value="<?= $chest->name ?>"/>
      <input type="number" name="life" value="<?= $chest->life ?>"/>
      <input type="number" name="def" value="<?= $chest->def ?>"/>
      <input type="number" name="atk" value="<?= $chest->atk ?>"/>
      <input type="number" name="magic" value="<?= $chest->magic ?>"/>
      <input type="number" name="speed" value="<?= $chest->speed ?>"/>
      <input type="number" name="gold" value="<?= $chest->gold ?>"/>
      </br>
      <input type="number" name="variation_life" placeholder="<?= $chest->variation_life ?>"/>
      <input type="number" name="variation_def" placeholder="<?= $chest->variation_def ?>"/>
      <input type="number" name="variation_atk" placeholder="<?= $chest->variation_atk ?>"/>
      <input type="number" name="variation_magic" placeholder="<?= $chest->variation_magic ?>"/>
      <input type="number" name="variation_speed" placeholder="<?= $chest->variation_speed ?>"/>
      <input type="number" name="variation_gold" placeholder="<?= $chest->variation_gold ?>"/>
      <button type="submit">Update</button>
    </form>

    <a href="index.php?controller=AdminChestController&delete=1&id_chest=<?= $chest->id_chest ?>">Delete</a>
  </body>
</html>
