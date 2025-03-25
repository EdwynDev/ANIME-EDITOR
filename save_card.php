<?php
session_start();

header('Content-Type: application/json');

try {
    $json = file_get_contents('php://input');
    $cardData = json_decode($json, true);

    if (!isset($_SESSION['cards'])) {
        $_SESSION['cards'] = array();
    }

    $_SESSION['cards'][] = $cardData;
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
