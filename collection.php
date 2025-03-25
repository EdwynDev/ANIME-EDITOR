<?php
session_start();
$pageTitle = "Collection";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
        <i class="fas fa-dragon mr-3"></i>Collection
    </h1>
    
    <?php if (!isset($_SESSION['cards']) || empty($_SESSION['cards'])): ?>
        <div class="text-white text-center">
            <p>No cards in your collection yet.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($_SESSION['cards'] as $index => $card): ?>
                <div class="gradient-border-basic p-2 shadow-basic">
                    <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                        <div class="card-image-box">
                            <img src="<?php echo htmlspecialchars($card['imageUrl']); ?>" alt="Card Image"/>
                        </div>
                        <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                            <?php echo htmlspecialchars($card['cardType']); ?>
                        </div>
                        <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                            <span class="text-stroke-bolder"><?php echo htmlspecialchars($card['name']); ?></span>
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
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
</body>

</html>