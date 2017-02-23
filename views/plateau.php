<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
      <title> DONJON </title>
      <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/animate.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/java.js"></script> -->
  </head>
  <body style="">
    <?php


      // liste des choix et de leurs faisabilité
      foreach ($choices as $choice => $val) {
        echo '<a href="index.php?choice='.$choice.'" class="'.($val ? '' : 'disable').'">'.$choice.'</a></br>';
      }

      // affichage des informations de la salle
      echo 'nb monstre: '.$nb_monstre.'</br>';
      echo 'nb coffre: '.$nb_coffre.'</br>';

      // affichage de la progression
      echo 'niveau : '.$niveau.'/5</br>';
      // affichage de la qte de gold;
      echo 'golds : '.$gold.'</br>';

    ?>

  </body>
</html>
