<?php
session_start();

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);

    // Validation de l'URL de l'image
    if (empty($data['imageUrl'])) {
        $data['imageUrl'] = 'https://placehold.co/320x500';
    }

    // Add fonts to the card data
    $data['fonts'] = [
        'nameFont' => $_POST['nameFont'] ?? 'Electrolize',
        'skillFont' => $_POST['skillFont'] ?? 'Electrolize',
        'descFont' => $_POST['descFont'] ?? 'Electrolize',
        'statsFont' => $_POST['statsFont'] ?? 'Lilita One'
    ];

    if (!isset($_SESSION['cards'])) {
        $_SESSION['cards'] = [];
    }

    array_push($_SESSION['cards'], $data);
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
