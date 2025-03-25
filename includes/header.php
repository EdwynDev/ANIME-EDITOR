<?php
session_start();
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Created by Edwyn - Roblox name: CALAMITY_DESTROYER (@Edy_Chou)">
    <meta name="keywords"
        content="anime, card game, editor, trading cards, anime card clash, card clash, card editor, card creator">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="author" content="Edwyn">
    <meta name="theme-color" content="#4A1D96">
    <!-- Trust Signals -->
    <meta name="verification" content="This is an unofficial editor tool for Anime Card Clash. Neopolyworks is just my domain name. I do not own Anime Card Clash. All rights reserved to the original creators. This tool is for educational purposes only. Please support the original game. Thank you.">
    <meta name="copyright" content="© 2025 Edwyn. All rights reserved.">
    <meta name="owner" content="Edwyn (@Edy_Chou)">
    <title><?= $pageTitle ?: "Anime Card Clash - Editor" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/modal.css">
    <script></script>
    <style>
        body {
            font-family: 'Electrolize';
        }

        .card-image-box {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .card-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            -webkit-mask-image: linear-gradient(to bottom,
                    rgba(121, 121, 121, 0.01) 0%,
                    rgba(121, 121, 121, 0.5) 20%,
                    rgba(121, 121, 121, 1) 80%,
                    rgba(121, 121, 121, 0) 100%);
            mask-image: linear-gradient(to bottom,
                    rgba(121, 121, 121, 0.01) 0%,
                    rgba(121, 121, 121, 0.5) 20%,
                    rgba(121, 121, 121, 1) 80%,
                    rgba(121, 121, 121, 0) 100%);
        }

        .gradient-border {
            border: 4px solid;
            border-image-slice: 1;
            border-width: 4px;
        }

        .gradient-border-basic {
            position: relative;
            background: linear-gradient(45deg, #646464, #9a9a9a);
            border-radius: 0.6rem;
        }

        .gradient-border-gold {
            position: relative;
            background: linear-gradient(45deg, #a28732, #fbd24e);
            border-radius: 0.6rem;
        }

        .gradient-border-rainbow {
            position: relative;
            background: linear-gradient(45deg, #f44d36, #55dd5d, #6424e9, #a04a8d, #ea8612);
            border-radius: 0.6rem;
        }

        .gradient-border-secret {
            position: relative;
            background: linear-gradient(45deg, #c80000, #ca0000);
            border-radius: 0.6rem;
        }

        .gradient-content {
            position: relative;
            z-index: 1;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .hover-scale {
            transition: transform 0.2s;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-linear-gradient {
            background: transparent;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            background-image: linear-gradient(180deg, #ffffff 0%, #aaaaaa 100%);
            text-shadow: #000000 0px 0px 5px;
            font-weight: 600;
        }

        .stat-dmg {
            font-family: "Lilita One";
            background: transparent;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            background-image: linear-gradient(180deg, #e37d80 0%, #d14647 100%);
            text-shadow: none;
        }

        .stat-hp {
            font-family: "Lilita One";
            background: transparent;
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            background-image: linear-gradient(180deg, #7db380 0%, #458c49 100%);
            text-shadow: none;
        }

        @keyframes rotatingShadow {
            0% {
                filter: drop-shadow(0 0 5px var(--shadow-start)) drop-shadow(0 0 10px var(--shadow-end));
            }

            25% {
                filter: drop-shadow(5px 0 5px var(--shadow-start)) drop-shadow(-5px 0 10px var(--shadow-end));
            }

            50% {
                filter: drop-shadow(0 0 5px var(--shadow-start)) drop-shadow(0 0 10px var(--shadow-end));
            }

            75% {
                filter: drop-shadow(-5px 0 5px var(--shadow-start)) drop-shadow(5px 0 10px var(--shadow-end));
            }

            100% {
                filter: drop-shadow(0 0 5px var(--shadow-start)) drop-shadow(0 0 10px var(--shadow-end));
            }
        }

        .shadow-basic {
            --shadow-start: #808080;
            --shadow-end: #d3d3d3;
            animation: rotatingShadow 3s infinite linear;
        }

        .shadow-gold {
            --shadow-start: #ffd700;
            --shadow-end: #ffec8b;
            animation: rotatingShadow 3s infinite linear;
        }

        .shadow-rainbow {
            --shadow-start: #f44d36;
            --shadow-end: #55dd5d;
            animation: rotatingShadow 3s infinite linear;
        }

        .shadow-secret {
            --shadow-start: #c80000;
            --shadow-end: #ca0000;
            animation: rotatingShadow 3s infinite linear;
        }

        .rarity-card {
            position: relative;
            transition: all 0.3s ease;
        }

        .full-card {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-140%, -100%);
            z-index: 50;
        }

        .rarity-card:hover .full-card,
        .rarity-card:focus .full-card {
            display: block;
        }

        .rarity-preview {
            cursor: pointer;
        }

        .rarity-card {
            transform-style: preserve-3d;
            transition: transform 0.5s;
            position: relative;
        }

        .rarity-card:hover {
            z-index: 50;
        }

        .rarity-preview {
            position: relative;
            width: 160px;
            height: 160px;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .grid-cols-2 {
                grid-template-columns: 1fr !important;
            }

            .rarity-card {
                margin-bottom: 20px !important;
            }

            .full-card {
                transform: translate(-50%, -50%) !important;
            }

            .glass-effect {
                padding: 10px !important;
            }

            .space-y-6 {
                margin-top: 20px !important;
            }

            .space-y-4 {
                margin-top: 10px !important;
            }
        }

        .text-stroke {
            text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000,
                1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000 !important;
        }

        .text-stroke-bolder {
            text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000,
                1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000,
                2px 2px #000, -2px -2px #000, 2px -2px #000, -2px 2px #000 !important;
        }

        .bg-basic {
            background: linear-gradient(45deg, #808080, #d3d3d3);
        }

        .bg-gold {
            background: linear-gradient(45deg, #ffd700, #ffec8b);
        }

        .bg-rainbow {
            background: linear-gradient(45deg, #f44d36, #55dd5d, #6424e9, #a04a8d, #ea8612);
        }

        .bg-secret {
            background: linear-gradient(45deg, #c80000, #ca0000);
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .footer-link {
            display: flex;
            align-items: center;
            color: #fff;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
        }

        .footer-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            color: #c4b5fd;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-social a {
            display: flex;
            align-items: center;
            color: #fff;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
        }

        .footer-social a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            color: #c4b5fd;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 min-h-screen">
    <nav class="glass-effect fixed top-0 w-full z-50 px-6 py-4">
        <div class="container mx-auto flex justify-between items-center ls:flex-col">
            <h1 class="text-white text-2xl font-bold">
                <i class="fas fa-dragon mr-2"></i>
                <a href="/" class="text-white hover:text-purple-400">Anime Card Clash</a> - <?= $pageTitle ?: "Editor" ?>
            </h1>
            <div class="flex gap-4">
                <a href="collection.php" class="text-white hover:text-purple-400">
                    <i class="far fa-bookmark mr-1"></i>Collection
                </a>
            </div>
        </div>
    </nav>

    <!-- Add modal templates at the end of header -->
    <div id="successModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-content">
                <i class="fas fa-check-circle text-4xl text-green-500 mb-4"></i>
                <h2 class="text-xl text-white mb-4" id="successMessage">Success!</h2>
                <div class="modal-buttons">
                    <button onclick="closeModal('successModal')" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmModal" class="modal-overlay">
        <div class="modal">
            <div class="modal-content">
                <i class="fas fa-question-circle text-4xl text-yellow-500 mb-4"></i>
                <h2 class="text-xl text-white mb-4" id="confirmMessage">Are you sure?</h2>
                <div class="modal-buttons">
                    <button id="confirmYes" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
                        Yes
                    </button>
                    <button onclick="closeModal('confirmModal')" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded">
                        No
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(modalId, message) {
            document.getElementById(modalId).style.display = 'block';
            if (message) {
                document.getElementById(modalId === 'successModal' ? 'successMessage' : 'confirmMessage').textContent = message;
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function showConfirm(message, callback) {
            showModal('confirmModal', message);
            document.getElementById('confirmYes').onclick = () => {
                closeModal('confirmModal');
                callback();
            };
        }
    </script>