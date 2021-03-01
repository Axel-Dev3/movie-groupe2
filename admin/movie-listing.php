<?php
require('../inc/functions.php');
require('../inc/pdo.php');
$sql = "SELECT * FROM movies_full ORDER BY id ASC LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();
$films = $query->fetchAll();
//debug($films);

require('inc/header.php'); ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tous mes films</h1>

    <p class="mb-4">infos movies</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">mes films</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Titre</th>
                        <th>genres</th>
                        <th>directors</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($films as $film) { ?>
                        <tr>
                            <td><?= $film['id']; ?></td>
                            <td><?= $film['title']; ?></td>
                            <td><?= $film['genres']; ?></td>
                            <td><?= $film['directors']; ?></td>
                            <td>
                                <a href="#">voir sur front</a>
                                <a href="#">edit</a>
                                <a href="#">delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require('inc/footer.php');
