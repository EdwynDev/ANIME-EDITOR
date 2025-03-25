<?php
session_start();
$pageTitle = "Collection";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="bg-yellow-900/50 border-l-4 border-yellow-500 p-4 mb-8 rounded">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-yellow-500"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-yellow-200">
                    <span class="font-bold">Warning:</span> Your collection is stored in your browser's session storage.
                    Clearing your browser data or session will result in data loss. Please be aware that this is a demo application
                    and no permanent storage is implemented.
                </p>
            </div>
        </div>
    </div>

    <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
        <i class="far fa-bookmark mr-3"></i>Collection
    </h1>

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
        <div class="flex flex-wrap gap-6">
            <?php foreach ($_SESSION['cards'] as $index => $card): ?>
                <div class="relative flex flex-col items-center align-center gap-4">
                    <div class="gradient-border-<?php echo strtolower($card['rarity'] ?? 'basic'); ?> p-2 shadow-<?php echo strtolower($card['rarity'] ?? 'basic'); ?>">
                        <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img src="<?php echo htmlspecialchars($card['imageUrl']); ?>" alt="Card Image" />
                            </div>
                            <div class="absolute top-2 left-2 bg-<?php echo strtolower($card['rarity'] ?? 'basic'); ?> text-black text-xs font-bold px-2 py-1 rounded">
                                <?php echo strtoupper($card['rarity'] ?? 'basic'); ?>
                            </div>
                            <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                <span class="text-stroke-bolder"><?php echo htmlspecialchars($card['name']); ?></span>
                            </div>
                            <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                #<?php echo $index; ?>
                            </div>
                            <div class="absolute bottom-16 left-2 right-2 px-2">
                                <p><span class="text-xl text-white font-bold text-linear-gradient text-stroke">
                                        <?php echo htmlspecialchars($card['skill']); ?></span></p>
                                <p class="mt-3 mb-12"><span class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                        <?php echo htmlspecialchars($card['description']); ?></span></p>
                            </div>
                            <?php if ($card['cardType'] !== 'support'): ?>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg">DMG <span><?php echo htmlspecialchars($card['damage']); ?></span></div>
                                    <div class="stat-hp font-bold text-lg">HP <span><?php echo htmlspecialchars($card['hp']); ?></span></div>
                                </div>
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
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8 mt-8">
    <i class="fas fa-arrow-left mr-2"></i>Back to Editor
</a>
</div>
<script>
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
</script>
</body>

</html>