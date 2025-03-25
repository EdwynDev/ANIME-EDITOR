<?php
session_start();

// Récupérer les données JSON
$json = file_get_contents('php://input');
$cardData = json_decode($json, true);

// Initialiser le tableau des cartes s'il n'existe pas
if (!isset($_SESSION['cards'])) {
    $_SESSION['cards'] = [];
}

// Ajouter la nouvelle carte
$_SESSION['cards'][] = $cardData;

// Sauvegarder dans la session
$_SESSION['cards'] = $_SESSION['cards'];

echo json_encode(['success' => true]);
?>
