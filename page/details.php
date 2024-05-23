<?php
include "./controllers/const.php";
include './database/db.php';

// Récupérer l'ID du problème depuis l'URL
$problemId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Récupérer les détails du problème depuis la base de données
$sql = 'SELECT * FROM probleme WHERE id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$problemId]);
$problem = $stmt->fetch();

if (!$problem) {
    echo 'Problème non trouvé!';
    exit;
}

// Mettre à jour le statut du problème si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStatus = isset($_POST['status']) ? htmlspecialchars($_POST['status']) : '';

    $updateSql = 'UPDATE probleme SET statut = ? WHERE id = ?';
    $updateStmt = $pdo->prepare($updateSql);
    if ($updateStmt->execute([$newStatus, $problemId])) {
        // Mettre à jour le statut dans la variable $problem
        $problem['statut'] = $newStatus;
    }
}
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
            <div class="container">
                <img class="image-section" src="<?php echo $url . htmlspecialchars($problem['photo']); ?>" alt="Image du problème">
                <div class="text-section">
                    <h1><?php echo htmlspecialchars($problem['description']); ?></h1>
                    <p>Catégorie: <?php echo htmlspecialchars($problem['categorie']); ?></p>
                    <p>Status: <?php echo htmlspecialchars($problem['statut']); ?></p>
                    <p>Date de création: <?php echo date('d-m-Y H:i:s', strtotime($problem['create_date'])); ?></p>
                    <form method="post">
                        <div class="dropdown">
                            <select name="status">
                                <option value="Traité" <?php echo $problem['statut'] == 'Traité' ? 'selected' : ''; ?>>Traité</option>
                                <option value="En attente" <?php echo $problem['statut'] == 'En attente' ? 'selected' : ''; ?>>En attente</option>
                                <option value="Pas traité" <?php echo $problem['statut'] == 'Pas traité' ? 'selected' : ''; ?>>Pas traité</option>
                            </select>
                        </div>
                        <button type="submit">Mettre à jour le statut</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- End of Reminders-->

    </div>

</main>