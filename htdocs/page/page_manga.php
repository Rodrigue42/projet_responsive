<?php

include '../partial/connection.php';
include '../partial/jumbotron.php';
include '../partial/navbar.php';


$manga = $bdd->prepare('SELECT * FROM manga WHERE nom = ?');
$manga->execute(array($_GET['name']));
$donnees = $manga->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mang'Anime <?= $donnees['nom'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <p class="titre_carte">
        <?= $donnees['nom']; ?>
    </p><br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 vertab-container">
                <div class="col-lg-3 col-md-3 col-sm-3  vertab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item text-left"> Synopsis </a>
                        <a href="#" class="list-group-item text-left"> Animés / Films </a>
                        <a href="#" class="list-group-item text-left"> Images </a>
                        <a href="#" class="list-group-item text-left"> Video trailer </a>
                    </div>
                </div>
                <div id="accordion" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 vertab-accordion panel-group">
                    <div class="vertab-content">
                        <div class="panel-heading">
                            <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                Synopsis
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="info-carte"><b>Age : </b>
                                    <? echo $donnees['age']; ?> ans et +</p>
                                <p><b>Auteur : </b>
                                    <? echo $donnees['auteur']; ?>
                                </p>
                                <p><b>Genre : </b>
                                    <? echo $donnees['genre']; ?>
                                </p>
                                <p><b>SYNOPSIS :</b><br><br></p>
                                <p>
                                    <? echo $donnees['description']; ?>
                                </p>

                                <?
                                $reponse->closeCursor();
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="vertab-content">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                            <h4 class="panel-title">
                                Animé / Films
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p><b>Nombre de Tome :</b>
                                    <? echo $donnees['tome']; ?>
                                </p>
                                <p><b>Nombre d'épisode(s) :</b>
                                    <? echo $donnees['episode']; ?>
                                </p>
                                <p><b>Film :</b><br><br>
                                    <ul>
                                        <li>Neon Genesis Evangelion - Death and Rebirth (1996) </li>
                                        <li>Neon Genesis Evangelion : The end of Evangelion (1997) </li>
                                        <li>Evangelion : 1.0 You Are (Not) Alone (2007) </li>
                                        <li>Evangelion : 2.0 You Can (Not) Advance (2008) </li>
                                        <li>Evangelion : 3.0 You Can (Not) Redo (2009) </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="vertab-content">
                        <div class="panel-heading">
                            <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                                Images
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <img src="<?= $donnees['image1'] ?>" class="img-responsive" width="804" height="456" alt="Responsive image">

                                <img src="<?= $donnees['image2'] ?>" class="img-responsive" width="804" height="456" alt="Responsive image">
                            </div>
                        </div>
                    </div>

                    <div class="vertab-content">
                        <div class="panel-heading">
                            <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                Trailer
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="container-fluid text-center">
                                    <h1>Video Trailer</h1>
                                    <div class="video-wrap">
                                        <iframe width="560" height="315" src="<?php echo $donnees['URL'] ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <? include '../partial/footer.php' ?>
    <? include '../partial/script_et_carte_infos.php' ?>
</body>

</html>