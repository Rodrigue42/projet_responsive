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
    
</head>

<body>

    <!-- jumbotron -->
    <? include '../partial/jumbotron.php' ?>

    <!-- navbar -->
    <? include '../partial/navbar.php' ?>

    <center>
        <form action="../partial/connection_form.php" method="POST" enctype="multipart/form-data"><br><br>
            <label for="nom">Nom du manga </label>
            <input type="text" name="nom" required><br><br>

            <label for="age">Age rating + </label>
            <input type="text" name="age" required><br><br>

            <label for="genre">Action, Aventure, Fantasy </label>
            <input type="text" name="genre" required><br><br>

            <label>Image du menu </label>
            <input type="file" name="image"><br><br>

            <label for="description">Description </label>
            <input type="text" name="description" required><br><br>

            <label for="auteur">Auteur </label>
            <input type="text" name="auteur" required><br><br>

            <label for="URL">https://www.youtube.com/embed/ </label>
            <input type="text" name="URL"><br><br>

            <label for="tome">Nombre de tomes </label>
            <input type="text" name="tome" required><br><br>

            <label for="episode">Nombre d'épisodes </label>
            <input type="text" name="episode" required><br><br>

            <label for="image1">../image/___1.jpg </label>
            <input type="text" name="image1"><br><br>

            <label for="image2">../image/___2.jpg </label>
            <input type="text" name="image2"><br><br>

            <input type="submit" value="envoyer"><br><br><br>
        </form>
    </center>

</body>

</html>