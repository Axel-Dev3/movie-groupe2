<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Projet Git</title>
  </head>
  <body>
    <header>
      <ul>
          <?php if(isLogged()) { ?>
              <p><a href="admin/index.php">Admin</a></p>
              <li><a href="logout.php">Déconnexion</a></li>
              <li>Bonjour <?= ucfirst($_SESSION['user']['pseudo']) ?></li>
          <?php } else { ?>
              <li><a href="register.php">Inscription</a></li>
              <li><a href="login.php">Connexion</a></li>
          <?php } ?>
      </ul>
    </header>

    <main>