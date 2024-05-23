<?php

include "./controllers/const.php";
include "./controllers/counter.php";


?>

<main>
    <div class="header">
        <div class="left">
            <h1><?php echo $name ?></h1>
            <ul class="breadcrumb">
                /
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
        </div>

    </div>

    <!-- Insights -->
    <ul class="insights">
        <li>
            <i class='bx bx-calendar-check'></i>
            <span class="info">
                <h3>
                    <?php echo $countAll ?>
                </h3>
                <p>Paid Order</p>
            </span>
        </li>
        <li><i class='bx bx-show-alt'></i>
            <span class="info">
                <h3>
                    <?php echo $countAttente ?>
                </h3>
                <p>Site Visit</p>
            </span>
        </li>
        <li><i class='bx bx-line-chart'></i>
            <span class="info">
                <h3>
                    <?php echo $countTraite ?>
                </h3>
                <p>Searches</p>
            </span>
        </li>
        <li><i class='bx bx-dollar-circle'></i>
            <span class="info">
                <h3>
                    <?php echo $countPasTraite ?>
                </h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>
    <!-- End of Insights -->

    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-receipt'></i>
                <h3>Recent Orders</h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-search'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="images/profile-1.jpg">
                            <p>John Doe</p>
                        </td>
                        <td>14-08-2023</td>
                        <td><span class="status process">Processing</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Reminders -->

        <div class="reminders">
            <div class="header">
                <i class='bx bx-note'></i>
                <h3>Reminders</h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-plus'></i>
            </div>
            <ul class="task-list">
                <?php foreach ($recentProblems as $problem) : ?>
                    <?php
                    $statusClass = '';
                    if ($problem['statut'] == 'Traité') {
                        $statusClass = 'completed';
                        $icon = 'bx bx-check-circle';
                    } elseif ($problem['statut'] == 'En attente') {
                        $statusClass = 'process';
                        $icon = 'bx bx-time';
                    } elseif ($problem['statut'] == 'Pas traité') {
                        $statusClass = 'not-completed';
                        $icon = 'bx bx-x-circle';
                    }
                    ?>
                    <li class="<?php echo $statusClass; ?>">
                        <div class="task-title">
                            <i class="<?php echo $icon; ?>"></i>
                            <p><?php echo htmlspecialchars($problem['description']); ?></p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- End of Reminders-->

    </div>

</main>