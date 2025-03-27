<?php
header('Content-Type: application/json');

if (!isset($_GET['font'])) {
    echo json_encode(['exists' => false]);
    exit;
}

$fontName = $_GET['font'];
$apiKey = 'AIzaSyAZPkHXJPPuaZm8CyvE6yb8X5rcOm_AJIg';
$baseUrl = 'https://www.googleapis.com/webfonts/v1/webfonts';

$response = file_get_contents("{$baseUrl}?key={$apiKey}");
$fonts = json_decode($response, true);

$exists = false;
$exactFontFamily = '';

if ($fonts && isset($fonts['items'])) {
    foreach ($fonts['items'] as $font) {
        if (strtolower($font['family']) === strtolower($fontName)) {
            $exists = true;
            $exactFontFamily = $font['family'];
            break;
        }
    }
}

echo json_encode([
    'exists' => $exists,
    'fontFamily' => $exactFontFamily
]);
