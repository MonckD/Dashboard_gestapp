<?php
// panel.php
session_start();

if (isset($_SESSION['admin_id'])) {
    header('Location: panel.php'); // Rediriger vers la page de connexion si non connecté
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            border: 1px solid black;
            padding: 30px 20px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .container form input {
            width: 400px;
            height: 50px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login Page</h2>
        <br>
        <form action="./controllers/login_admin.php" method="post">
            <input name="email" type="email" placeholder="email" required>
            <input name="password" type="password" placeholder="mot de passe" required>
            <input type="submit" style="color: white; background-color: blue; border: none" value="Se connecter">
            <?php
            if (isset($_SESSION['error'])) {
                echo '<span style="color: red; align-items: center">' . $_SESSION['error'] . '</span>';
                unset($_SESSION['error']); // Supprimer le message après l'affichage
            }
            ?>
        </form>
    </div>
</body>

</html>