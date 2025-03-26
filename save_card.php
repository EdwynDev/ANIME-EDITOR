<?php
session_start();
header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);

    // Validation de l'URL de l'image
    if (empty($data['imageUrl'])) {
        $data['imageUrl'] = 'https://placehold.co/320x500';
    }

    // S'assurer que les polices sont préservées du JSON envoyé
    if (!isset($data['fonts'])) {
        $data['fonts'] = [
            'nameFont' => $data['fonts']['nameFont'] ?? 'Electrolize',
            'skillFont' => $data['fonts']['skillFont'] ?? 'Electrolize',
            'descFont' => $data['fonts']['descFont'] ?? 'Electrolize',
            'statsFont' => $data['fonts']['statsFont'] ?? 'Lilita One'
        ];
    }

    if (!isset($_SESSION['cards'])) {
        $_SESSION['cards'] = [];
    }

    array_push($_SESSION['cards'], $data);
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
