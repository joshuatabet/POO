<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Choice hero to start the game</h1>
    <ul>
      <?php if ($heros): ?>
        <?php foreach ($heros as $hero): ?>
          <li><a href="index.php?controller=GameController&choiceHero=1&id_hero=<?= $hero['id_character'] ?>"><?= $hero['name'] ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </body>
</html>
