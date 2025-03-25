<?php
session_start();

if (isset($_GET['index']) && isset($_SESSION['cards'])) {
    $index = $_GET['index'];
    $cards = $_SESSION['cards'];
    
    if (isset($cards[$index])) {
        echo json_encode($cards[$index]);
        exit;
    }
}

echo json_encode(null);
?>
