<?php
// add_admin.php
require '../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Utilisation de htmlspecialchars pour éviter les injections XSS
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mpd = password_hash($_POST['mpd'], PASSWORD_BCRYPT); // Hachage du mot de passe

    // Préparation de la requête SQL pour insérer les données dans la table admin
    $sql = 'INSERT INTO admin (nom, prenom, email, mpd) VALUES (?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nom, $prenom, $email, $mpd]);
        header('Location: ../panel.php?page=utilisateurs');
        // echo 'Administrateur ajouté avec succès!';
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
