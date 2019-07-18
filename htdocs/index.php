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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- jumbotron -->
    <? include 'partial/jumbotron.php' ?>

    <!-- navbar -->
    <? include 'partial/navbar.php' ?>

    <!-- connection  -->
    <? include 'partial/connection.php'; ?>


    <?php
    // reglage du nombre des articles par page
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int) $_GET['per-page'] : 12;
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


    // requête preparer 
    $articles = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS * 
                           FROM manga 
                           LIMIT {$start}, {$perPage}
                           ");

    $articles->execute();
    $articles = $articles->fetchAll(PDO::FETCH_ASSOC);
    $total = $bdd->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
    $pages = ceil($total / $perPage);
    ?>


    <!-- card des mangas creer via la boucle -->
    <?php
    foreach ($articles as $article) {
        ?>
        <div class="container">
            <div class="row">
                <div class="container_img">
                    <div class="col-sm-3">
                        <h4>
                            <?= $article['nom']; ?>
                        </h4>
                        <div class="image-box">
                            <a href="page/page_manga.php?name=<?= $article['nom'] ?>">
                                <img src="<?php echo $article['image'] ?>" class="img-thumbnail" width="100%"></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- card des mangas -->

    <div class="pagination">
        <?php for ($x = 1; $x <= $pages; $x++) {
            ?>
            <a href="?page=<?php echo $x; ?>& per-page=<?php echo $perPage; ?>" <?php if ($page === $x) {
                                                                                    echo 'class="selected"';
                                                                                } ?>><?php echo $x; ?></a>
        <?php
        }
        ?>
    </div>

    <!-- Footer -->
    <? include 'partial/footer.php' ?>
</body>

</html>