<?php
session_start();
header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data['imageUrl'])) {
        $data['imageUrl'] = 'https://placehold.co/320x500';
    }

    if (!isset($data['fonts'])) {
        $data['fonts'] = [
            'nameFont' => 'Electrolize',
            'skillFont' => 'Electrolize',
            'descFont' => 'Electrolize',
            'statsFont' => 'Lilita One'
        ];
    }

    if (!isset($data['effects'])) {
        $data['effects'] = [
            'nameEffect' => 'none',
            'skillEffect' => 'none'
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
