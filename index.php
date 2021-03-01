<?php require('inc/functions.php');
require('inc/pdo.php');


$sql = "SELECT * FROM movies_full ORDER BY RAND()";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();

// debug($movies);
require('inc/header.php'); ?>

<p><a href="admin/index.php">Admin</a></p>

<?php foreach ($movies as $movie): ?>
<div class="film">
  <ul>
    <li><?php echo imageMovie($movie); ?></li>
    <li><a href="details.php?">Voir</a></li>
  </ul>
</div>

<?php endforeach; ?>

<?php require('inc/footer.php');



echo 'Michel';
