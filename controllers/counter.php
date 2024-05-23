<?php
// count_problems.php
require './database/db.php';

// Variables pour les requêtes SQL
$today = date('Y-m-d');

// Compter tous les problèmes de la journée
$sqlAll = 'SELECT COUNT(*) FROM probleme WHERE DATE(create_date) = ?';
$stmtAll = $pdo->prepare($sqlAll);
$stmtAll->execute([$today]);
$countAll = $stmtAll->fetchColumn();

// Compter les problèmes de la journée avec le statut "attente"
$sqlAttente = 'SELECT COUNT(*) FROM probleme WHERE DATE(create_date) = ? AND statut = ?';
$stmtAttente = $pdo->prepare($sqlAttente);
$stmtAttente->execute([$today, 'En attente']);
$countAttente = $stmtAttente->fetchColumn();

// Compter les problèmes de la journée avec le statut "traité"
$sqlTraite = 'SELECT COUNT(*) FROM probleme WHERE DATE(create_date) = ? AND statut = ?';
$stmtTraite = $pdo->prepare($sqlTraite);
$stmtTraite->execute([$today, 'Traité']);
$countTraite = $stmtTraite->fetchColumn();

// Compter les problèmes de la journée avec le statut "pas traité"
$sqlPasTraite = 'SELECT COUNT(*) FROM probleme WHERE DATE(create_date) = ? AND statut = ?';
$stmtPasTraite = $pdo->prepare($sqlPasTraite);
$stmtPasTraite->execute([$today, 'Pas traité']);
$countPasTraite = $stmtPasTraite->fetchColumn();

// Récupérer les trois derniers problèmes
$sql = 'SELECT * FROM probleme ORDER BY create_date DESC LIMIT 3';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$recentProblems = $stmt->fetchAll();

?>
