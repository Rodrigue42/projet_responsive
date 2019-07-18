<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mang'Anime</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/musique.css">
</head>

<body>

    <!-- jumbotron -->
    <? include '../partial/jumbotron.php' ?>

    <!-- navbar -->
    <? include '../partial/navbar.php' ?>

    <!-- connection  -->
    <?php include '../partial/conn_audio_another.php' ?>


    
    
    <!-- FICHIERS EN COURS DE REALISATION -->
    <!-- FICHIERS EN COURS DE REALISATION -->
    <!-- FICHIERS EN COURS DE REALISATION -->
    
    
    
    <!-- boucle sur la card -->
    <!-- On affiche chaque entrée une à une -->
    <?php
    while ($donnees = $reponse->fetch()) {
        ?>
        <div id="conteneur">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sound : Another <?php echo $donnees['id'] ?></h5>
                            <div class="lecteur1">
                                <audio preload="auto" controls="controls" type="audio/mpeg">
                                    <source type="audio/ogg" src="<?php echo $donnees['son'] ?>">
                                    Votre navigateur ne prend pas en charge la lecture des fichiers audio HTML5
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    $reponse->closeCursor();

    ?>

    <!-- footer -->
    <? include '../partial/footer.php' ?>

</body>

</html>
