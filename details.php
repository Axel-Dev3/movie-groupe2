<?php require('inc/functions.php');
require('inc/pdo.php');

if (!empty($_GET['slug'])) {
    $slug = $_GET['slug'];
    $sql = "SELECT * FROM movies_full WHERE slug = :slug";
    $query = $pdo->prepare($sql);
    $query->bindValue(':slug',$slug,PDO::PARAM_STR);
    $query->execute();
    $movie = $query->fetch();
} else {
  die('404');
}


require('inc/header.php'); ?>

<section class="details">
  <ul>
    <h1><?= $movie['title']; ?></h1>
    <li><?= $movie['year']; ?></li>
    <li><?= $movie['genres']; ?></li>
    <li><?= $movie['plot']; ?></li>
    <li><?= $movie['directors']; ?></li>
    <li><?= $movie['cast']; ?></li>
    <li><?= $movie['writers']; ?></li>
    <?php echo imageMovie($movie); ?>
    <li><a href="index.php">Retour</a></li>
    <li><a href="favoris.php">favoris</a></li>

  </ul>
</section>

<?php require('inc/footer.php');
