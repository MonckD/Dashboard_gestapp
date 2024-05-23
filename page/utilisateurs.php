<?php

include "./controllers/const.php";
include './database/db.php';

$sql = 'SELECT * FROM admin ORDER BY dateOfCreation DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$admins = $stmt->fetchAll();


?>

<main>
    <div class="header">
        <div class="left">
            <h1><?php echo $name ?></h1>
            <ul class="breadcrumb">
                /
                <li><a href="#" class="active">Utilisateurs</a></li>
            </ul>
        </div>
        <a href="./add.php" class="report">
            <i class='bx bx-user-plus'></i></i>
            <span>Ajouter un utilisateur</span>
        </a>

    </div>

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Les utilisateurs</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom Prenoms</th>
                        <th>Email</th>
                        <th>Date de création</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p><?php echo htmlspecialchars($admin['prenom']) . ' ' . htmlspecialchars($admin['nom']); ?></p>
                        </td>
                        <td><?php echo htmlspecialchars($admin['email']); ?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($admin['dateOfCreation'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>

        <!-- End of Reminders-->

    </div>

</main>