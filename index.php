<?php require('inc/functions.php');
require('inc/pdo.php');
session_start();

$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();


// debug($movies);
require('inc/header.php'); ?>

<p><a href="admin/index.php">Admin</a></p>
<ul>
  <li><a href="register.php">Créer un compte</a></li>
  <li><a href="login.php">Se connecter</a></li>
  <li><a href="logout.php">Déconnexion</a></li>
  <button type="button" id="button" name="button">Filtres</button>
</ul>
<section id="filtre_search">

  <h1>Filtre de recherche</h1>
  <label for="titre">Titre A a Z</label>
  <input type="checkbox" name="titre" value="titre">
  <label for="year">année voulu</label>
  <input type="number" placeholder="Année" name="year" value="">
  <label for="genre">Genres</label>
  <input type="checkbox" name="genres" value="genres">
  <label for="author">Auteur</label>
  <input type="text" name="author" placeholder="Auteur" value="">

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
