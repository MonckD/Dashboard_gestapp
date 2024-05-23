<?php
include "./controllers/const.php";
include "./controllers/getAllProblems.php";

?>

<main>
    <div class="header">
        <div class="left">
            <h1><?php echo $name ?></h1>
            <ul class="breadcrumb">
                /
                <li><a href="#" class="active">Problèmes</a></li>
            </ul>
        </div>

    </div>

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Problèmes rescents</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Catégorie</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($problems as $problem) : ?>
                        <?php
                        $statusClass = '';
                        $statusText = '';
                        if ($problem['statut'] == 'Traité') {
                            $statusClass = 'completed';
                            $statusText = 'Traité';
                        } elseif ($problem['statut'] == 'En attente') {
                            $statusClass = 'pending';
                            $statusText = 'En attente';
                        } elseif ($problem['statut'] == 'Pas traité') {
                            $statusClass = 'process';
                            $statusText = 'Pas traité';
                        }
                        ?>
                        <!-- code js pour afficher les détails -->
                        <tr onclick="window.location.href='panel.php?page=details&id=<?php echo $problem['id']; ?>'"> 
                            <td>
                                <img src="<?php echo $url . $problem['photo']; ?>" alt="Photo">
                                <p><?php echo htmlspecialchars($problem['description']); ?></p>
                            </td>
                            <td><?php echo date('d-m-Y', strtotime($problem['create_date'])); ?></td>
                            <td><?php echo htmlspecialchars($problem['categorie']); ?></td>
                            <td><span class="status <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

</main>