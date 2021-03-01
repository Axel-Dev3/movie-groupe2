<?php require('inc/functions.php');
require('inc/pdo.php');
session_start();

$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();


// debug($movies);
require('inc/header.php'); ?>

<button type="button" id="button" name="button">Filtres</button>
<section id="filtre_search">

  <form method="POST">
    <h1>Filtre de recherche</h1>

    <label for="titre">Titre A a Z</label>
    <input type="checkbox" name="titre" value="<?php if(!empty($_POST['titre'])) {echo $_POST['titre'];} ?>">
    <span class="errors"><?php if(!empty($errors['titre'])) {echo $errors['titre'];} ?></span>

    <label for="year">année voulu</label>
    <input type="number" placeholder="Année" name="year" value="<?php if(!empty($_POST['year'])) {echo $_POST['year'];} ?>">
    <span class="errors"><?php if(!empty($errors['year'])) {echo $errors['year'];} ?></span>

    <label for="genre">Genres</label>
    <input type="text" name="genres" placeholder="Drame, Comedie, Action etc..." value="<?php if(!empty($_POST['genres'])) {echo $_POST['genres'];} ?>">
    <span class="errors"><?php if(!empty($errors['genres'])) {echo $errors['genres'];} ?></span>

    <label for="author">Auteur</label>
    <input type="text" name="author" placeholder="Auteur" value="<?php if(!empty($_POST['author'])) {echo $_POST['author'];} ?>">
    <span class="errors"><?php if(!empty($errors['author'])) {echo $errors['author'];} ?></span>

    <input type="submit" name="submited" value="Rechercher">
  </form>

</section>

<script type="text/javascript">
  function filtre(){
    var btn = document.getElementById('#button')

  }
</script>

<?php foreach ($movies as $movie): ?>
<div class="film">
  <ul>
    <li><?php echo imageMovie($movie); ?></li>
    <li><a href="details.php?slug=<?= $movie['slug']; ?>">Voir</a></li>
  </ul>
</div>

<?php endforeach; ?>
<div class="button">
  <p><a href="index.php">+ de films</a></p>
</div>

<?php require('inc/footer.php');
