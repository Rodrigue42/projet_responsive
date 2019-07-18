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
    <link rel="stylesheet" href="../css/wallpaper.css">
</head>

<body>

    <!-- A FAIRE - creer la pagination automatique des fan'Art comme pour les mangas -->
    

    <?php

    $donnees = $bdd->query("SELECT image, image1, image2 from manga ORDER BY id");
    $donnee = $donnees->fetchAll();

    foreach ($donnee as $key) {

        ?>

        <div class="container">
            <div class="row">
                <div class="container_img">
                    <div class="col-sm-3">
                        <div class="card">
                            <a href="<?= $key['image']; ?>"><img src="<? echo $key['image'] ?>" class="card-img-top" alt="wallpaper"></a>
                            <a href="<?= $key['image1']; ?>"><img src="<? echo $key['image1'] ?>" class="card-img-top" alt="wallpaper"></a>
                            <a href="<?= $key['image2']; ?>"><img src="<? echo $key['image2'] ?>" class="card-img-top" alt="wallpaper"></a>
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