<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$index = $data['index'] ?? null;

if ($index !== null && isset($_SESSION['cards'][$index])) {
    unset($_SESSION['cards'][$index]);
    $_SESSION['cards'] = array_values($_SESSION['cards']); // Réindexer le tableau
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Card not found']);
}
