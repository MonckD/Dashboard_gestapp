<?php

include "./controllers/const.php";
include './database/db.php';

// Fetch all users
$sql = 'SELECT * FROM user ORDER BY nom, prenom ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

?>

<main>
    <div class="header">
        <div class="left">
            <h1><?php echo $name ?></h1>
            <ul class="breadcrumb">
                /
                <li><a href="#" class="active">Etudiants</a></li>
            </ul>
        </div>

    </div>

    <!-- Insights -->

    <!-- End of Insights -->

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Recent Orders</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Bâtiment</th>
                        <th>Palier</th>
                        <th>Chambre</th>
                        <th>Lit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td>
                                    <img src="<?php echo $url . htmlspecialchars($user['photo']); ?>">
                                    <p><?php echo htmlspecialchars($user['prenom']) . ' ' . htmlspecialchars($user['nom']); ?></p>
                            </td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['batiment']); ?></td>
                            <td><?php echo htmlspecialchars($user['palier']); ?></td>
                            <td><?php echo htmlspecialchars($user['chambre']); ?></td>
                            <td><?php echo htmlspecialchars($user['lit']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- End of Reminders-->

    </div>

</main>