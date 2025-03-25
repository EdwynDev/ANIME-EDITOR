<?php
$pageTitle = "Collection";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
        <i class="fas fa-dragon mr-3"></i>Collection
    </h1>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <script>
                const cards = JSON.parse(localStorage.getItem('cards')) || [];
                cards.forEach(card => {
                    document.write(`
            <?php ob_start(); ?>
                <div class="swiper-slide">
                    <div class="gradient-border-basic p-2 shadow-basic">
                        <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img src="<?php echo $card['imageUrl']; ?>" />
                            </div>
                            <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                                <?php echo $card['cardType']; ?>
                            </div>
                            <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                <span class="text-stroke-bolder"><?php echo $card['name']; ?></span>
                            </div>
                            <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                #0
                            </div>
                            <div class="absolute bottom-16 left-2 right-2 px-2">
                                <p>
                                    <span class="text-xl text-white font-bold text-linear-gradient text-stroke"><?php echo $card['skill']; ?></span>
                                </p>
                                <p class="mt-3 mb-12">
                                    <span class="text-xs text-white font-bold text-linear-gradient text-stroke"><?php echo $card['description']; ?></span>
                                </p>
                            </div>
                            <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                <div class="stat-dmg font-bold text-lg">DMG <span><?php echo $card['damage']; ?></span>
                                </div>
                                <div class="stat-hp font-bold text-lg">HP <span><?php echo $card['hp']; ?></span>
                                </div>
                            </div>
                        </div>cla                   </div>
            <?php
            echo ob_get_clean();
            ?>`)
                });
            </script>
            ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
</body>

</html>