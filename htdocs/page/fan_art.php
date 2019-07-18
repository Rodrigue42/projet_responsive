<?php

include '../partial/jumbotron.php';
include '../partial/navbar.php';
include '../partial/connection.php';

?>

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
    <link rel="stylesheet" href="../css/fan_art.css">
</head>

<body>

    <!-- OK  1 - creer une table fan_Art :   id, nom, createur, URL de l'image -->
    <!-- OK  2 - creer une boucle pour ajouter une carte à chaque entree dans la bdd "fan_Art" -->
    <!-- A FAIRE - creer la pagination automatique des fan'Art comme pour les mangas -->

    <?php

    $donnees = $bdd->query("SELECT * FROM Fan_Art");
    $donnee = $donnees->fetchAll();

    foreach ($donnee as $key) {

        ?>

        <div class="container">
            <div class="row">
                <div class="container_img">
                    <div class="col-sm-3">
                        <div class="card">

                            <a href="<? echo $key['URL'] ?>"><img src="<? echo $key['URL'] ?>" class="card-img-top" alt="categorie"></a>

                            <div class="card-body">
                                <p class="card-text">Intitulé : <?= $key["nom_fan_art"]; ?><br>
                                Créer par :
                                <? echo $key["nom_createur"]; ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>



        <? include '../partial/footer.php' ?>
        <? include '../partial/script_et_carte_infos.php' ?>
</body>

</html>