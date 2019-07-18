<?php
try {

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=Manga_DB;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

if (isset($_FILES['image'])) {

    if ($_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/jpeg') {
        $tmp_name = $_FILES['image']["tmp_name"];
        $name = basename($_FILES['image']["name"]);
        move_uploaded_file($tmp_name, "../image/$name");
    } else {
        echo 'erreur mauvais type de fichier seul les formats PNG,JPG,JPEG son accepter';
    }
    $path = "../image/" . $name;
    $reponse = $bdd->prepare('INSERT INTO manga(nom, age, genre, image, description, auteur, URL, tome, episode, image1, image2) VALUE(?,?,?,?,?,?,?,?,?,?,?)');
    $reponse->execute(array(
        $_POST['nom'],
        $_POST['age'],
        $_POST['genre'],
        $path,
        $_POST['description'],
        $_POST['auteur'],
        $_POST['URL'],
        $_POST['tome'],
        $_POST['episode'],
        $_POST['image1'],
        $_POST['image2']
    ));
    
    header('location: ../index.php');
} 

