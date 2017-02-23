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
      <style>
        a {
          color: black;
        }
        a.disable {
          color: red;
        }
      </style>
  </head>
  <body style="">
    <?php


      // liste des choix et de leurs faisabilité
      foreach ($choices as $choice => $val) {
        echo '<a href="index.php?choice='.$choice.'" class="'.($val ? '' : 'disable').'">'.$choice.'</a></br>';
      }
      echo 'Nom: '.$context->hero->nom.'</br>';
      echo 'Vie: '.$context->hero->vie.'</br>';
      echo 'Attaque: '.$context->hero->attaque.'</br>';
      echo 'Defense: '.$context->hero->defense.'</br>';
      echo 'Vitesse: '.$context->hero->vitesse.'</br>';
      echo 'Magie: '.$context->hero->magie.'</br>';
      // affichage des informations de la salle
      echo 'nb monstre: '.$context->niveau->get('monstre').'</br>';
      echo 'nb coffre: '.$context->niveau->get('coffre').'</br>';

      // affichage de la progression
      echo 'niveau : '.$context->niveau->id.'/5</br>';
      // affichage de la qte de gold;
      echo 'golds : '.$context->gold.'</br>';

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $('a').click(function(e){
          if ($(this).hasClass('disable')) {
            e.preventDefault();
          }
        })
      });
    </script>
  </body>
</html>
