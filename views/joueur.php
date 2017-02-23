<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="index.php" method="get">
      <?php
        foreach ($heros as $hero) {
          echo '<input type="radio" name="hero" value="'.$hero->id.'" checked>'.$hero->nom.'</br>';
        }
      ?>
      <input type="submit" value="Choisir"/>
    </form>
  </body>
</html>
