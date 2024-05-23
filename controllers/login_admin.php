<?php
// login_admin.php
session_start();
require '../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Préparation de la requête SQL pour vérifier les identifiants
    $sql = 'SELECT * FROM admin WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    // Vérification du mot de passe
    if ($admin && password_verify($password, $admin['mpd'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_nom'] = $admin['nom'];
        // Redirection vers une page protégée (ex. panel.php)
        header('Location: ../panel.php');
        exit;
    } else {
        // Stocker le message d'erreur dans la session
        $_SESSION['error'] = 'Email ou mot de passe incorrect';
        header('Location: ../index.php');
        exit;
    }
}
?>
