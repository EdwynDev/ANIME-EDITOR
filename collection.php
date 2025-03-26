<?php
session_start();
$pageTitle = "Collection";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="bg-yellow-900/50 border-l-4 border-yellow-500 p-4 mb-8 rounded cursor-pointer" onclick="toggleSection('warning-content')">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                <span class="ml-3 font-bold text-yellow-200">Local Storage Warning</span>
            </div>
            <i class="fas fa-chevron-down text-yellow-500 transform transition-transform duration-200" id="warning-arrow"></i>
        </div>
        <div class="ml-3 space-y-2 hidden mt-4" id="warning-content">
            <p class="text-sm text-yellow-200">
                Your collection is temporarily stored in your browser. To avoid data loss:
            </p>
            <ul class="text-sm text-yellow-200 list-disc pl-5 space-y-1">
                <li>Use the Export button regularly to backup your collection</li>
                <li>Import your saved collection JSON file to restore your cards</li>
                <li>Your cards will be lost if you clear browser data or close the session</li>
                <li>Preview your collection's JSON data using the Preview JSON button</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold flex items-center text-purple-300 mb-2 lg:mb-0">
            <i class="far fa-bookmark mr-3"></i>Collection
        </h1>
        <div class="flex gap-4 justify-center">
            <button onclick="exportCollection()" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-download"></i>
            </button>
            <label class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 cursor-pointer">
                <i class="fas fa-upload"></i>
                <input type="file" accept=".json" onchange="importCollection(this)" class="hidden">
            </label>
            <button onclick="previewJSON()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-code"></i>
            </button>
        </div>
    </div>

    <div class="bg-gray-800/50 p-4 rounded-lg mb-8 cursor-pointer" onclick="toggleSection('management-content')">
        <div class="flex items-center justify-between">
            <h3 class="text-purple-300 font-bold">
                <i class="fas fa-info-circle mr-2"></i>Collection Management
            </h3>
            <i class="fas fa-chevron-down text-purple-300 transform transition-transform duration-200" id="management-arrow"></i>
        </div>
        <div class="hidden mt-4" id="management-content">
            <ul class="text-white text-sm space-y-2">
                <li><i class="fas fa-download text-blue-400 mr-2"></i>Save your collection as a JSON file for backup</li>
                <li><i class="fas fa-upload text-green-400 mr-2"></i>Load a previously saved collection JSON file</li>
                <li><i class="fas fa-code text-purple-400 mr-2"></i>View your collection data in JSON format</li>
                <li class="text-yellow-200"><i class="fas fa-exclamation-triangle mr-2"></i>Note: Importing will replace your current collection</li>
            </ul>
        </div>
    </div>

    <?php if (!isset($_SESSION['cards']) || empty($_SESSION['cards'])): ?>
        <div class="text-white text-center space-y-4">
            <p>No cards in your collection yet.</p>
            <div class="bg-gray-800/50 p-4 rounded-lg max-w-lg mx-auto">
                <h3 class="text-purple-300 font-bold mb-2">How to add cards:</h3>
                <ol class="text-left text-sm space-y-2">
                    <li><i class="fas fa-arrow-left text-purple-400 mr-2"></i>Click on "Back to Editor"</li>
                    <li><i class="fas fa-edit text-purple-400 mr-2"></i>Fill in the card details in the editor</li>
                    <li><i class="fas fa-wand-magic-sparkles text-purple-400 mr-2"></i>Preview different card rarities</li>
                    <li><i class="fas fa-save text-purple-400 mr-2"></i>Click "Save in your collection" to add the card</li>
                </ol>
            </div>
        </div>
    <?php else: ?>
        <div class="flex flex-wrap gap-6 justify-center">
            <?php foreach ($_SESSION['cards'] as $index => $card): ?>
                <div class="relative flex flex-col items-center align-center gap-4">
                    <div class="card-<?php echo $index; ?> gradient-border-<?php echo strtolower($card['rarity'] ?? 'basic'); ?> p-2 shadow-<?php echo strtolower($card['rarity'] ?? 'basic'); ?>">
                        <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img src="<?php echo !empty($card['imageUrl']) ? htmlspecialchars($card['imageUrl']) : 'https://placehold.co/320x500'; ?>"
                                    alt="Card Image"
                                    class="absolute inset-0 w-full h-full object-cover"
                                    onerror="this.src='https://placehold.co/320x500'" />
                            </div>
                            <div class="absolute top-2 left-2 bg-<?php echo strtolower($card['rarity'] ?? 'basic'); ?> text-black text-xs font-bold px-2 py-1 rounded">
                                <?php echo strtoupper($card['rarity'] ?? 'basic'); ?>
                            </div>
                            <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                <span class="text-stroke-bolder" style="font-family: '<?php echo $card['fonts']['nameFont'] ?? 'Electrolize'; ?>', sans-serif;">
                                    <?php echo htmlspecialchars($card['name']); ?>
                                </span>
                            </div>
                            <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                #<?php echo htmlspecialchars($card['cardNumber'] ?? $index); ?>
                            </div>
                            <div class="absolute bottom-16 left-2 right-2 px-2">
                                <p>
                                    <span class="text-xl text-white font-bold text-linear-gradient text-stroke"
                                        style="font-family: '<?php echo $card['fonts']['skillFont'] ?? 'Electrolize'; ?>', sans-serif;">
                                        <?php echo htmlspecialchars($card['skill']); ?>
                                    </span>
                                </p>
                                <p class="mt-3 mb-12">
                                    <span class="text-xs text-white font-bold text-linear-gradient text-stroke"
                                        style="font-family: '<?php echo $card['fonts']['descFont'] ?? 'Electrolize'; ?>', sans-serif;">
                                        <?php echo htmlspecialchars($card['description']); ?>
                                    </span>
                                </p>
                            </div>
                            <?php if ($card['cardType'] !== 'support'): ?>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg"
                                        style="font-family: '<?php echo $card['fonts']['statsFont'] ?? 'Lilita One'; ?>', sans-serif;">
                                        DMG <span id="stat-dmg-<?php echo $index; ?>"></span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg"
                                        style="font-family: '<?php echo $card['fonts']['statsFont'] ?? 'Lilita One'; ?>', sans-serif;">
                                        HP <span id="stat-hp-<?php echo $index; ?>"></span>
                                    </div>
                                </div>
                                <script>
                                    function formatNumberWithSuffix(num) {
                                        if (num < 1000) return num;
                                        const suffixes = [
                                            '', 'K', 'M', 'B', 'T', 'Qa', 'Qi', 'Sx', 'Sp', 'Oc', 'No', 'Dc',
                                            'UDc', 'DDc', 'TDc', 'QaDc', 'QiDc', 'SxDc', 'SpDc', 'ODc', 'NDc',
                                            'Vg', 'UVg', 'DVg', 'TVg', 'QaVg', 'QiVg', 'SxVg', 'SpVg', 'OVg', 'NVg',
                                            'Tg', 'UTg', 'DTg', 'TTg', 'QaTg', 'QiTg', 'SxTg', 'SpTg', 'OTg', 'NTg',
                                            'Qd', 'UQd', 'DQd', 'TQd', 'QaQd', 'QiQd', 'SxQd', 'SpQd', 'OQd', 'NQd',
                                            'Qq', 'UQq', 'DQq', 'TQq', 'QaQq', 'QiQq', 'SxQq', 'SpQq', 'OQq', 'NQq',
                                            'Sg', 'USg', 'DSg', 'TSg', 'QaSg', 'QiSg', 'SxSg', 'SpSg', 'OSg', 'NSg',
                                            'St', 'USt', 'DSt', 'TSt', 'QaSt', 'QiSt', 'SxSt', 'SpSt', 'OSt', 'NSt',
                                            'Og', 'UOg', 'DOg', 'TOg', 'QaOg', 'QiOg', 'SxOg', 'SpOg', 'OOg', 'NOg',
                                            'Nn', 'UNn', 'DNn', 'TNn', 'QaNn', 'QiNn', 'SxNn', 'SpNn', 'ONn', 'NNn',
                                            'Ce', 'UCe'
                                        ];
                                        const exp = Math.floor(Math.log10(num) / 3);
                                        return (num / Math.pow(1000, exp)).toFixed(2) + suffixes[exp];
                                    }
                                    document.getElementById('stat-dmg-<?php echo $index; ?>').innerText = formatNumberWithSuffix(<?php echo intval($card['damage']); ?>);
                                    document.getElementById('stat-hp-<?php echo $index; ?>').innerText = formatNumberWithSuffix(<?php echo intval($card['hp']); ?>);
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="flex justify-center mt-2 gap-2">
                        <button class="edit-card bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200"
                            onclick="editCard(<?php echo $index; ?>)">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </button>
                        <button class="delete-card bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200"
                            onclick="deleteCard(<?php echo $index; ?>)">
                            <i class="fas fa-trash-alt mr-2"></i>Delete
                        </button>
                        <button class="download-card bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200"
                            onclick="downloadCard(<?php echo $index; ?>)">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8 mt-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>

<div id="jsonModal" class="modal-overlay">
    <div class="modal" style="width: 90%; max-width: 800px;">
        <div class="modal-content">
            <h2 class="text-xl text-white mb-4">Collection JSON Preview</h2>
            <pre id="jsonPreview" class="bg-gray-900 p-4 rounded-lg text-green-400 text-sm overflow-auto max-h-96 text-left"></pre>
            <div class="modal-buttons">
                <button onclick="closeModal('jsonModal')" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function downloadCard(index) {
        const div = document.querySelector(`.card-${index}`);
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        canvas.width = div.offsetWidth;
        canvas.height = div.offsetHeight;

        html2canvas(div).then(canvas => {
            const img = canvas.toDataURL();
            if (img.includes('image/gif')) {
                const gif = new GIF({
                    workers: 2,
                    quality: 10,
                });
                gif.addFrame(canvas);
                gif.on('finished', function(blob) {
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = 'carte_' + index + '.gif';
                    link.click();
                });
                gif.render();
            } else {
                const link = document.createElement('a');
                link.href = img;
                link.download = 'carte_' + index + '.png';
                link.click();
            }
        });
    }

    function deleteCard(index) {
        showConfirm('Are you sure you want to delete this card ?', () => {
            fetch('delete_card.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        index: index
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showModal('successModal', 'Card deleted successfully !');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                });
        });
    }

    function editCard(index) {
        window.location.href = `/?edit=${index}`;
    }

    function exportCollection() {
        const collection = <?php echo json_encode($_SESSION['cards'] ?? []); ?>;
        const dataStr = JSON.stringify(collection, null, 2);
        const dataUri = 'data:application/json;charset=utf-8,' + encodeURIComponent(dataStr);
        const exportName = 'anime_card_collection_' + new Date().toISOString().slice(0, 10) + '.json';

        const linkElement = document.createElement('a');
        linkElement.setAttribute('href', dataUri);
        linkElement.setAttribute('download', exportName);
        linkElement.click();
    }

    function importCollection(input) {
        const file = input.files[0];
        if (file) {
            showConfirm('Importing will replace your current collection. Continue?', () => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    try {
                        const collection = JSON.parse(e.target.result);
                        fetch('save_import.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(collection)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    showModal('successModal', 'Collection imported successfully!');
                                    setTimeout(() => window.location.reload(), 1500);
                                }
                            });
                    } catch (error) {
                        showModal('successModal', 'Error: Invalid JSON file');
                    }
                };
                reader.readAsText(file);
            });
        }
    }

    function previewJSON() {
        const collection = <?php echo json_encode($_SESSION['cards'] ?? []); ?>;
        document.getElementById('jsonPreview').textContent = JSON.stringify(collection, null, 2);
        showModal('jsonModal');
    }

    function toggleSection(contentId) {
        const content = document.getElementById(contentId);
        const arrow = document.getElementById(contentId.replace('content', 'arrow'));

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            arrow.style.transform = 'rotate(180deg)';
        } else {
            content.classList.add('hidden');
            arrow.style.transform = 'rotate(0deg)';
        }
    }
</script>
<script src="assets/js/editor.js"></script>
</body>

</html>