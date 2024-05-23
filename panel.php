<?php
// panel.php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php'); // Rediriger vers la page de connexion si non connecté
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
    <style></style>
</head>
<body>
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Asmr</span>Prog</div>
        </a>
        <ul class="side-menu">
            <li><a href="panel.php?page=dashboard"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="panel.php?page=probleme"><i class='bx bx-store-alt'></i>Problèmes</a></li>
            <li><a href="panel.php?page=utilisateurs"><i class='bx bx-group'></i>Utilisateurs</a></li>
            <li><a href="panel.php?page=etudiants"><i class='bx bx-message-square-dots'></i>Etudiants</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>

        <main>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            $allowedPages = ['dashboard', 'probleme', 'utilisateurs', 'etudiants', 'details'];

            if (in_array($page, $allowedPages)) {
                include './page/' . $page . '.php';
            } else {
                include './page/dashboard.php';
            }
            ?>
        </main>
    </div>
</body>
</html>
