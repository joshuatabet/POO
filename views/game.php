<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The Donjon</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="views/css/style"/>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php?controller=GameController&menu=1">Menu</a></li>
          </ul>
          <div class="btn-group" role="group" aria-label="...">

            <?php foreach ($game->levels as $level): ?>
              <button type="button" class="btn navbar-btn <?= $level->id_level == $game->level->id_level ? 'btn-primary' : 'btn-default' ?>"><?= $level->name ?></button>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </nav>

    <div class="container container-main">
      </br>
      <div class="row">
        <div class="col-xs-3">
          <h3 class="text-center">Hero / <?= $game->hero->name ?></h3>
          <div class="col-xs-12">
            <table class="table">
              <tr><th>Life:</th><td><span class="badge"><?= $game->hero->life ?></span></td></tr>
              <tr><th>Def:</th><td><span class="badge"><?= $game->hero->def ?></span></td></tr>
              <tr><th>Atk:</th><td><span class="badge"><?= $game->hero->atk ?></span></td></tr>
              <tr><th>Magic:</th><td><span class="badge"><?= $game->hero->magic ?></span></td></tr>
              <tr><th>Speed:</th><td><span class="badge"><?= $game->hero->speed ?></span></td></tr>
              <tr><th>Gold:</th><td><span class="badge"><?= $game->hero->gold ?></span></td></tr>
            </table>
          </div>
          <div class="col-xs-12">
            <div class="list-group">
              <button type="button" class="list-group-item"  href="index.php?controller=GameController&observe=1">Observer</button>
              <?php if ($game->hero->atk): ?>
                <button type="button" class="list-group-item <?= $game->level->view && $game->level->getNbAliveMonster() > 0 ? '" href="index.php?controller=GameController&attack=1&atk=1"' : 'disabled"' ?>">Attaquer</button>
              <?php endif; ?>
              <?php if ($game->hero->magic): ?>
                  <button type="button" class="list-group-item <?= $game->level->view && $game->level->getNbAliveMonster() > 0 ? '" href="index.php?controller=GameController&attack=1&magic=1"' : 'disabled"' ?>">Attaquer</button>
              <?php endif; ?>
              <button type="button" class="list-group-item" href="index.php?controller=GameController&defend=1">Défendre</button>
              <button type="button" class="list-group-item" href="index.php?controller=GameController&escape=1">Fuir</button>
              <button type="button" class="list-group-item <?= $game->level->getNbAliveMonster() > 0 ? 'disabled"' : '" href="index.php?controller=GameController&openchest=1"' ?>" >Ouvrir un coffre</button>
              <button type="button" class="list-group-item <?= $game->level->getNbAliveMonster() > 0 ? 'disabled"' : '" href="index.php?controller=GameController&nextLevel=1"' ?>">Passer au niveau suivant</button>
            </div>
          </div>
        </div>
        <div class="col-xs-9">
          <div class="row">
            <div class="col-xs-12">
              <div class="row">

                <div class="col-xs-8">
                  <h3>Monster
                    <?php if ($game->level->view): ?>
                      <span class="badge"><?= $game->level->nb_monster ?></span>
                    <?php endif; ?>
                  </h3>
                  <?php if ($game->level->view): ?>
                    <?php if (isset($game->level->monsters) && !empty($game->level->monsters)): ?>
                      <?php foreach ($game->level->monsters as $monster): ?>
                        <div class="col-xs-4">
                          <div class="thumbnail">
                            <!-- <img src="..." alt="..."> -->
                            <div class="caption">
                              <h4><?= $monster->name ?></h4>
                              <p>Life: <?= $monster->life ?></p>
                              <p>Atk: <?= $monster->atk ?></p>
                              <p>Def: <?= $monster->def ?></p>
                              <p>Speed: <?= $monster->speed?></p>
                              <p>Magic: <?= $monster->magic?></p>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
                <div class="col-xs-4">
                  <h3>Chest
                    <?php if ($game->level->view): ?>
                      <span class="badge"><?= $game->level->nb_chest ?></span>
                    <?php endif; ?>
                  </h3>
                  <?php if ($game->level->view): ?>
                    <?php if (isset($game->level->chests) && !empty($game->level->chests)): ?>
                      <?php foreach ($game->level->chests as $chest): ?>
                        <div class="col-xs-12">
                          <div class="thumbnail">
                            <!-- <img src="..." alt="..."> -->
                            <div class="caption">
                              <?php if (!$chest->isLocked): ?>
                                <h4><?= $chest->name ?></h4>
                                <?php if ($chest->life): ?>
                                  <p>Life : <?= $chest->life ?> </p></br>
                                <?php endif; ?>
                                <?php if ($chest->def): ?>
                                  <p>Def : <?= $chest->def ?> </p></br>
                                <?php endif; ?>
                                <?php if ($chest->atk): ?>
                                  <p>Atk : <?= $chest->atk ?> </p></br>
                                <?php endif; ?>
                                <?php if ($chest->magic): ?>
                                  <p>Magic : <?= $chest->magic ?> </p></br>
                                <?php endif; ?>
                                <?php if ($chest->gold): ?>
                                  <p>Gold : <?= $chest->gold ?> </p></br>
                                <?php endif; ?>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        // declenchement ou pas des requetes d'action
        // se declenche si l'element contient l'attribut href
        $('.list-group-item').click(function(e) {
          e.preventDefault();
          if ($(this).attr('href')) {
            window.location = $(this).attr('href');
          }
        });
      });
    </script>
  </body>
</html>
