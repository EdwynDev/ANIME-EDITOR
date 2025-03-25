<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$index = $data['index'] ?? null;

if ($index !== null && isset($_SESSION['cards'][$index])) {
    unset($data['index']); // Remove index from card data
    $_SESSION['cards'][$index] = $data;
    echo json_encode(['success' => true]);
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'error' => 'Card not found']);
}
