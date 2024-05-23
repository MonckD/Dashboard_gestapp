<?php 

require './database/db.php';


// Récupérer tous les problèmes
$sql2 = 'SELECT * FROM probleme ORDER BY create_date DESC';
$stmt = $pdo->prepare($sql2);
$stmt->execute();
$problems = $stmt->fetchAll();

?>