<?php
session_start();
header('Content-Type: application/json');

if (isset($_GET['index']) && isset($_SESSION['cards'])) {
    $index = $_GET['index'];
    
    if (isset($_SESSION['cards'][$index])) {
        $card = $_SESSION['cards'][$index];
        $card = array_merge([
            'name' => 'N/A',
            'skill' => 'N/A',
            'description' => 'N/A',
            'imageUrl' => 'https://placehold.co/320x500',
            'probability' => 1,
            'damage' => '0',
            'hp' => '0',
            'cardType' => 'character',
            'fonts' => [
                'nameFont' => 'Electrolize',
                'skillFont' => 'Electrolize',
                'descFont' => 'Electrolize',
                'statsFont' => 'Lilita One'
            ]
        ], $card);
        
        echo json_encode($card);
        exit;
    }
}

http_response_code(404);
echo json_encode(['error' => 'Card not found']);
?>
