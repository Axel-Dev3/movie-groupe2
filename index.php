<?php
session_start();
require('inc/functions.php');
require('inc/pdo.php');


$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 10";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();

$categorys = array('drama','animation','comedy');

if (!empty($_POST['submited'])) {
  debug($_POST);
  $genres = array();
  
  
  if(!empty($_POST['genres'])) {
    $genres = $_POST['genres'];
  }

 
  $sql = "SELECT * FROM movies_full WHERE 1 = 1";

  foreach($genres as $genre) {
    $sql .= " AND genres LIKE :$genre";
  }

  if(!empty($_POST['year1']) && !empty($_POST['year2'])) {
    $year1 = $_POST['year1'];
    $year2 = $_POST['year2'];
    $sql .= " AND (year BETWEEN :year1 AND :year2)";
  }

  $sql .= " ORDER BY RAND() LIMIT 10";
  // prepare 
  $query = $pdo->prepare($sql);
  // protection injection sql
  foreach($genres as $genre) {
    $query->bindValue(':'.$genre,'%'. $genre . '%');
  }
  if(!empty($_POST['year1']) && !empty($_POST['year2'])) {
    $query->bindValue(':year1',$year1);
    $query->bindValue(':year2',$year2);
  }
  // execute 
  $query->execute();
  $movies = $query->fetchAll();

}
// debug($_POST);
// debug($movies);
require('inc/header.php'); ?>


<!-- gestion du filtre de recherche -->
<button type="button" id="button" name="button">Filtres</button>
<section id="filtre_search">

<form method="POST">

  <h1>Filtre de recherche</h1>

  <label for="titre">Titre Ordre croissant</label>
  <input type="checkbox" name="titre" value="">

  <label for="years">Choix des Années </label>
  <select name="year1" id="year1">
    <?php for ($i = 1887; $i < 2015; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';
    } ?>
  </select>

  <select name="year2" id="year2">
    <?php for ($i = 1888; $i < 2015; $i++) {
      echo '<option value="'.$i.'">'.$i.'</option>';
    } ?>
  </select>

  <?php foreach($categorys as $category) { ?>
    <label for="<?= $category; ?>"><?= ucfirst($category); ?></label>
    <input type="checkbox" name="genres[]" value="<?= $category; ?>">
  <?php } ?>
  


  <input type="submit" id="btn" name="submited" value="Rechercher">

</form>

</section>


 <!-- afficher les films  -->
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




<!-- gestion du filtre de recherche en javascript -->
<script type="text/javascript">
  
    var filtre = document.getElementById('filtre_search');
    var btn = document.getElementById('button');
    btn.addEventListener('click' ,function(event){ 
    event.preventDefault();
    filtre.style.display = 'block';  
 })

</script>
<?php require('inc/footer.php');
