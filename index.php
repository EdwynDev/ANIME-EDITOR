<?php
$pageTitle = "Card Editor";
$extraScripts = '<script src="assets/js/editor.js"></script>';
include 'includes/header.php';
?>

<div class="container mx-auto pt-24 px-6 pb-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="glass-effect rounded-xl p-6 space-y-6">
            <h2 class="text-white text-xl font-bold mb-6">
                <i class="fas fa-edit mr-2"></i>Card Editor
            </h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-id-card mr-2"></i>Type
                    </label>
                    <select id="cardType"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        onchange="updateCardType()">
                        <option value="character">Character</option>
                        <option value="support">Support</option>
                    </select>
                </div>

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-signature mr-2"></i>Name
                    </label>
                    <input id="name" type="text"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        placeholder="Card name" oninput="updateCard()">
                </div>

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-bolt mr-2"></i>Capacity
                    </label>
                    <input id="skill" type="text"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        placeholder="Capacity name" oninput="updateCard()">
                </div>

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-scroll mr-2"></i>Description
                    </label>
                    <textarea id="description"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        rows="3" placeholder="Capacity description" oninput="updateCard()"></textarea>
                </div>

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-image mr-2"></i>Image
                    </label>
                    <div class="flex gap-2">
                        <input id="image" type="url"
                            class="flex-1 bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                            placeholder="Image URL" oninput="updateCard()">
                        <label class="cursor-pointer bg-purple-600 hover:bg-purple-500 text-white rounded-lg p-3">
                            <i class="fas fa-upload"></i>
                            <input id="image-upload" type="file" accept="image/*" class="hidden"
                                onchange="handleImageUpload()">
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-percentage mr-2"></i>Probability
                    </label>
                    <input id="probability" type="number" min="1"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        placeholder="Card probability" oninput="updateCard()">
                </div>

                <div id="stats-container" class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-purple-300 text-sm mb-2">
                            <i class="fas fa-fire mr-2"></i>DMG
                        </label>
                        <input id="damage" type="number" min="0"
                            class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                            placeholder="Card DMG" oninput="updateCard()">
                    </div>
                    <div>
                        <label class="block text-purple-300 text-sm mb-2">
                            <i class="fas fa-heart mr-2"></i>HP
                        </label>
                        <input id="hp" type="number" min="0"
                            class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                            placeholder="Card HP" oninput="updateCard()">
                    </div>
                </div>

            </div>
            <div class="flex gap-4">
                <button id="save-button" class="text-white hover:text-purple-400">
                    <i class="fas fa-save mr-1"></i>Save
                </button>
            </div>
            <div class="flex gap-4">
                <select id="card-select" class="w-50 bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none">
                    <?php
                    session_start();
                    $cards = isset($_SESSION['cards']) ? json_decode($_SESSION['cards'], true) : [];
                    foreach ($cards as $index => $card) {
                    ?>
                        <option value="<?php echo $index; ?>"><?php echo $card['name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <button class="text-white hover:text-purple-400" id="load-button">
                    <i class="fas fa-folder-open mr-1"></i>Load
                </button>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const saveButton = document.getElementById('save-button');
                    const loadButton = document.getElementById('load-button');

                    saveButton.addEventListener('click', function() {
                        const cardData = {
                            name: document.getElementById('name').value.trim() || 'N/A',
                            skill: document.getElementById('skill').value.trim() || 'N/A',
                            description: document.getElementById('description').value.trim() || 'N/A',
                            imageUrl: document.getElementById('image').value.trim(),
                            probability: parseFloat(document.getElementById('probability').value) || 1,
                            damage: document.getElementById('damage').value || '0',
                            hp: document.getElementById('hp').value || '0',
                            cardType: document.getElementById('cardType').value
                        };

                        // Envoyer les données via AJAX
                        fetch('save_card.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(cardData)
                        });
                    });

                    loadButton.addEventListener('click', function() {
                        const cardIndex = document.getElementById('card-select').value;

                        // Charger la carte via AJAX
                        fetch('load_card.php?index=' + cardIndex)
                            .then(response => response.json())
                            .then(cardData => {
                                if (cardData) {
                                    document.getElementById('name').value = cardData.name;
                                    document.getElementById('skill').value = cardData.skill;
                                    document.getElementById('description').value = cardData.description;
                                    document.getElementById('image').value = cardData.imageUrl;
                                    document.getElementById('probability').value = cardData.probability;
                                    document.getElementById('damage').value = cardData.damage;
                                    document.getElementById('hp').value = cardData.hp;
                                    document.getElementById('cardType').value = cardData.cardType;
                                    updateCard();
                                }
                            });
                    });
                });
            </script>
        </div>

        <div class="space-y-6 flex flex-col items-center">
            <div class="gradient-border-basic p-2 shadow-basic">
                <div id="card" class="mx-auto relative w-80 ">
                    <div class="gradient-content h-[500px] bg-black rounded-lg overflow-hidden">
                        <div class="card-image-box">
                            <img id="card-image" src="https://placehold.co/320x500" />
                        </div>
                        <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                            <span id="card-rarity">BASIC</span>
                        </div>
                        <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                            <span id="card-name" class="text-stroke-bolder">N/A</span>
                        </div>
                        <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                            #0
                        </div>
                        <div class="absolute bottom-16 left-2 right-2 px-2">
                            <p>
                                <span id="card-skill"
                                    class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                            </p>
                            <p class="mt-3">
                                <span id="card-description"
                                    class="text-xs text-white font-bold text-linear-gradient text-stroke">N/A</span>
                            </p>
                        </div>
                        <div class="absolute bottom-2 w-full px-4 flex justify-between">
                            <div class="stat-dmg font-bold text-lg">
                                DMG <span id="card-damage">0</span>
                            </div>
                            <div class="stat-hp font-bold text-lg">
                                HP <span id="card-hp">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-10">
                <div class="gradient-border-basic p-1 shadow-basic rarity-card" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="basic-image" alt="Basic rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div
                                class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                                BASIC</div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder"
                                id="basic-probability"></div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-basic p-2 shadow-basic">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="basic-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div
                                    class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                                    BASIC</div>
                                <div
                                    class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="basic-full-name" class="text-stroke-bolder">N/A</span>
                                </div>
                                <div
                                    class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    #0</div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p><span id="basic-full-skill"
                                            class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                    <p class="mt-3 mb-12"><span id="basic-full-description"
                                            class="text-xs text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                </div>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg">DMG <span
                                            id="basic-full-damage">0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg">HP <span id="basic-full-hp">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-gold p-1 shadow-gold rarity-card" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="gold-image" alt="Gold rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div
                                class="absolute top-2 left-2 bg-gold text-black text-xs font-bold px-2 py-1 rounded">
                                GOLD</div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder"
                                id="gold-probability"></div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-gold p-2 shadow-gold">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="gold-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div
                                    class="absolute top-2 left-2 bg-gold text-black text-xs font-bold px-2 py-1 rounded">
                                    GOLD</div>
                                <div
                                    class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="gold-full-name" class="text-stroke-bolder">N/A</span>
                                </div>
                                <div
                                    class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    #0</div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p><span id="gold-full-skill"
                                            class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                    <p class="mt-3 mb-12"><span id="gold-full-description"
                                            class="text-xs text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                </div>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg">DMG <span id="gold-full-damage">0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg">HP <span id="gold-full-hp">0</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-rainbow p-1 shadow-rainbow rarity-card" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="rainbow-image" alt="Rainbow rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div
                                class="absolute top-2 left-2 bg-rainbow text-black text-xs font-bold px-2 py-1 rounded">
                                RAINBOW</div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder"
                                id="rainbow-probability"></div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-rainbow p-2 shadow-rainbow">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="rainbow-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div
                                    class="absolute top-2 left-2 bg-rainbow text-black text-xs font-bold px-2 py-1 rounded">
                                    RAINBOW</div>
                                <div
                                    class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="rainbow-full-name" class="text-stroke-bolder">N/A</span>
                                </div>
                                <div
                                    class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    #0</div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p><span id="rainbow-full-skill"
                                            class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                    <p class="mt-3 mb-12"><span id="rainbow-full-description"
                                            class="text-xs text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                </div>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg">DMG <span
                                            id="rainbow-full-damage">0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg">HP <span id="rainbow-full-hp">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-secret p-1 shadow-secret rarity-card" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="secret-image" alt="Secret rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            <div
                                class="absolute top-2 left-2 bg-secret text-black text-xs font-bold px-2 py-1 rounded">
                                SECRET</div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder"
                                id="secret-probability"></div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-secret p-2 shadow-secret">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="secret-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div
                                    class="absolute top-2 left-2 bg-secret text-black text-xs font-bold px-2 py-1 rounded">
                                    SECRET</div>
                                <div
                                    class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="secret-full-name" class="text-stroke-bolder">N/A</span>
                                </div>
                                <div
                                    class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    #0</div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p><span id="secret-full-skill"
                                            class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                    <p class="mt-3 mb-12"><span id="secret-full-description"
                                            class="text-xs text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                </div>
                                <div class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg">DMG <span
                                            id="secret-full-damage">0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg">HP <span id="secret-full-hp">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($extraScripts)) echo $extraScripts; ?>
<?php include 'includes/footer.php'; ?>