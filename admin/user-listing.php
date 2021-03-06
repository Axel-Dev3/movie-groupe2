<?php
require('../inc/functions.php');
require('../inc/pdo.php');
$sql = "SELECT * FROM users ORDER BY id ASC LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();
//debug($films);

require('inc/header.php'); ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tous mes users</h1>

    <p class="mb-4">infos users</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">mes utilisateurs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>pseudo</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['pseudo']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <a href="#">edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require('inc/footer.php');
