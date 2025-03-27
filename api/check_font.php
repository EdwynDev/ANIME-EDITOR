<?php
header('Content-Type: application/json');

if (!isset($_GET['font'])) {
    echo json_encode(['exists' => false, 'suggestions' => []]);
    exit;
}

$fontName = $_GET['font'];
$apiKey = 'AIzaSyAZPkHXJPPuaZm8CyvE6yb8X5rcOm_AJIg';
$baseUrl = 'https://www.googleapis.com/webfonts/v1/webfonts';

$response = file_get_contents("{$baseUrl}?key={$apiKey}&sort=popularity");
$fonts = json_decode($response, true);

$exactMatch = false;
$exactFontFamily = '';
$suggestions = [];

if ($fonts && isset($fonts['items'])) {
    foreach ($fonts['items'] as $font) {
        // Vérification de la correspondance exacte
        if (strtolower($font['family']) === strtolower($fontName)) {
            $exactMatch = true;
            $exactFontFamily = $font['family'];
        }
        
        // Ajouter à la liste des suggestions si le nom contient la saisie
        if (stripos($font['family'], $fontName) !== false) {
            $suggestions[] = $font['family'];
        }

        // Limiter à 50 suggestions
        if (count($suggestions) >= 50) {
            break;
        }
    }
}

echo json_encode([
    'exists' => $exactMatch,
    'fontFamily' => $exactFontFamily,
    'suggestions' => $suggestions
]);
