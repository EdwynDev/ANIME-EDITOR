<?php
$apiKey = 'AIzaSyAZPkHXJPPuaZm8CyvE6yb8X5rcOm_AJIg';
$baseUrl = 'https://www.googleapis.com/webfonts/v1/webfonts';

$response = file_get_contents("{$baseUrl}?key={$apiKey}&sort=popularity");
$fonts = json_decode($response, true);

header('Content-Type: application/json');
echo json_encode($fonts['items']);
