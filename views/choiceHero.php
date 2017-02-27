<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <ul>
      <?php if ($heros): ?>
        <?php foreach ($heros as $hero): ?>
          <li><a href="index.php?controller=GameController&choiceHero=1"><?= $hero['name'] ?></a></li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </body>
</html>
