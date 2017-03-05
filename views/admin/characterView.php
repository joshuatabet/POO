<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index.php?controller=AdminCharacterController">Return</a>
    <h1>Character view</h1>
    <form action="index.php?controller=AdminCharacterController&update=1" method="post">
      <?php if ($character->id_character): ?>
          <input type="hidden" name="id_character" value="<?= $character->id_character ?>"/>
      <?php endif?>
      <input type="text" name="name" value="<?= $character->name ?>"/>
      <input type="number" name="life" value="<?= $character->life ?>"/>
      <input type="number" name="def" value="<?= $character->def ?>"/>
      <input type="number" name="atk" value="<?= $character->atk ?>"/>
      <input type="number" name="magic" value="<?= $character->magic ?>"/>
      <input type="number" name="speed" value="<?= $character->speed ?>"/>
      </br>
      <input type="number" name="variation_atk" value="<?= $character->variation_atk ?>"/>
      <input type="number" name="variation_def" value="<?= $character->variation_def ?>"/>
      <input type="number" name="variation_magic" value="<?= $character->variation_magic ?>"/>
      <input type="number" name="variation_speed" value="<?= $character->variation_speed ?>"/>
      </br>
      monster
      <input type="radio" name="monster" value="1" <?= $character->monster ? 'checked' : '' ?>/>yes
      <input type="radio" name="monster" value="0" <?= $character->monster ? '' : 'checked' ?>/>no
      hero
      <input type="radio" name="hero" value="1" <?= $character->hero ? 'checked' : '' ?>/>yes
      <input type="radio" name="hero" value="0" <?= $character->hero ? '' : 'checked' ?>/>no
      <button type="submit">Update</button>
    </form>

    <a href="index.php?controller=AdminCharacterController&delete=1&id_character=<?= $character->id_character ?>">Delete</a>
  </body>
</html>
