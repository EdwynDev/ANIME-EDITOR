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

                <div>
                    <label class="block text-purple-300 text-sm mb-2">
                        <i class="fas fa-hashtag mr-2"></i>Card Number
                    </label>
                    <input id="cardNumber" type="number" min="0"
                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 focus:border-purple-300 focus:ring-2 focus:ring-purple-300 outline-none"
                        placeholder="Card number" oninput="updateCard()">
                </div>

                <div class="space-y-4 p-4 bg-gray-800/50 rounded-lg">
                    <h3 class="text-purple-300 font-bold">
                        <i class="fas fa-font mr-2"></i>Font Customization
                    </h3>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Card Name Font
                            </label>
                            <select id="nameFont" class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="updateFonts()">
                                <option value="Electrolize">Default (Electrolize)</option>
                                <option value="custom">Custom Font</option>
                            </select>
                            <div class="flex gap-2 mt-2">
                                <div class="relative flex-1">
                                    <input id="customnameFont" type="text" placeholder="Google Fonts name or URL"
                                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 hidden"
                                        oninput="handleFontSuggestions(this, 'nameFontSuggestions')">
                                    <div id="nameFontSuggestions" class="suggestions-container hidden absolute w-full z-50 max-h-60 overflow-y-auto bg-gray-800 border border-purple-500 rounded-lg mt-1">
                                    </div>
                                </div>
                                <button onclick="applyFont('name')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2 hidden" id="apply-nameFont">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Skill Name Font
                            </label>
                            <select id="skillFont" class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="updateFonts()">
                                <option value="Electrolize">Default (Electrolize)</option>
                                <option value="custom">Custom Font</option>
                            </select>
                            <div class="flex gap-2 mt-2">
                                <div class="relative flex-1">
                                    <input id="customskillFont" type="text" placeholder="Google Fonts name or URL"
                                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 hidden"
                                        oninput="handleFontSuggestions(this, 'skillFontSuggestions')">
                                    <div id="skillFontSuggestions" class="suggestions-container hidden absolute w-full z-50 max-h-60 overflow-y-auto bg-gray-800 border border-purple-500 rounded-lg mt-1">
                                    </div>
                                </div>
                                <button onclick="applyFont('skill')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2 hidden" id="apply-skillFont">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Description Font
                            </label>
                            <select id="descFont" class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="updateFonts()">
                                <option value="Electrolize">Default (Electrolize)</option>
                                <option value="custom">Custom Font</option>
                            </select>
                            <div class="flex gap-2 mt-2">
                                <div class="relative flex-1">
                                    <input id="customdescFont" type="text" placeholder="Google Fonts name or URL"
                                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 hidden"
                                        oninput="handleFontSuggestions(this, 'descFontSuggestions')">
                                    <div id="descFontSuggestions" class="suggestions-container hidden absolute w-full z-50 max-h-60 overflow-y-auto bg-gray-800 border border-purple-500 rounded-lg mt-1">
                                    </div>
                                </div>
                                <button onclick="applyFont('desc')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2 hidden" id="apply-descFont">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Stats Font
                            </label>
                            <select id="statsFont" class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="updateFonts()">
                                <option value="Lilita One">Default (Lilita One)</option>
                                <option value="custom">Custom Font</option>
                            </select>
                            <div class="flex gap-2 mt-2">
                                <div class="relative flex-1">
                                    <input id="customstatsFont" type="text" placeholder="Google Fonts name or URL"
                                        class="w-full bg-gray-800 text-white rounded-lg p-3 border border-purple-500 hidden"
                                        oninput="handleFontSuggestions(this, 'statsFontSuggestions')">
                                    <div id="statsFontSuggestions" class="suggestions-container hidden absolute w-full z-50 max-h-60 overflow-y-auto bg-gray-800 border border-purple-500 rounded-lg mt-1">
                                    </div>
                                </div>
                                <button onclick="applyFont('stats')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2 hidden" id="apply-statsFont">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="space-y-4 p-4 bg-gray-800/50 rounded-lg mt-4">
                    <h3 class="text-purple-300 font-bold">
                        <i class="fas fa-magic mr-2"></i>Font Effects
                    </h3>

                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Card Name Effect
                            </label>
                            <div class="flex gap-2">
                                <select id="nameEffect" class="flex-1 bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="previewEffect('name')">
                                    <option value="none">No Effect</option>
                                    <option value="3d">3D</option>
                                    <option value="3d-float">3D Float</option>
                                    <option value="anaglyph">Anaglyph</option>
                                    <option value="fire">Fire</option>
                                    <option value="fire-animation">Fire Animation</option>
                                    <option value="neon">Neon</option>
                                    <option value="outline">Outline</option>
                                    <option value="emboss">Emboss</option>
                                    <option value="shadow-multiple">Multiple Shadows</option>
                                </select>
                                <button onclick="applyEffect('name')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2" id="apply-nameEffect">
                                    Apply
                                </button>
                            </div>
                            <div class="mt-2 p-3 bg-gray-900 rounded-lg">
                                <span id="preview-nameEffect" class="text-white text-lg">Preview Text</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-purple-300 text-sm mb-2">
                                Skill Name Effect
                            </label>
                            <div class="flex gap-2">
                                <select id="skillEffect" class="flex-1 bg-gray-800 text-white rounded-lg p-3 border border-purple-500" onchange="previewEffect('skill')">
                                    <option value="none">No Effect</option>
                                    <option value="3d">3D</option>
                                    <option value="3d-float">3D Float</option>
                                    <option value="anaglyph">Anaglyph</option>
                                    <option value="fire">Fire</option>
                                    <option value="fire-animation">Fire Animation</option>
                                    <option value="neon">Neon</option>
                                    <option value="outline">Outline</option>
                                    <option value="emboss">Emboss</option>
                                    <option value="shadow-multiple">Multiple Shadows</option>
                                </select>
                                <button onclick="applyEffect('skill')" class="bg-purple-600 hover:bg-purple-500 text-white rounded-lg px-4 py-2" id="apply-skillEffect">
                                    Apply
                                </button>
                            </div>
                            <div class="mt-2 p-3 bg-gray-900 rounded-lg">
                                <span id="preview-skillEffect" class="text-white text-lg">Preview Text</span>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <button id="save-button"
                class="text-white hover:text-purple-400 group relative w-full bg-purple-600 rounded-lg p-3">
                <i class="fas fa-save mr-1"></i>Save in your collection
                <span class="opacity-0 group-hover:opacity-100 transition-opacity absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1 text-sm bg-gray-900 text-white rounded-lg whitespace-nowrap">
                    Save this card to view it later in your collection page
                </span>
            </button>
            <button id="edit-button"
                class="text-white hover:text-purple-400 group relative w-full bg-purple-600 rounded-lg p-3 hidden">
                <i class="fas fa-edit mr-1"></i>Save Edit
                <span class="opacity-0 group-hover:opacity-100 transition-opacity absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1 text-sm bg-gray-900 text-white rounded-lg whitespace-nowrap">
                    Update this card in your collection
                </span>
            </button>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-left align-left">
                <button onclick="downloadPreview('card-preview')"
                    class="text-white hover:text-green-400 relative">
                    <i class="fas fa-download mr-1"></i>Download Preview
                </button>
                <button onclick="downloadPreview('card-preview-all')"
                    class="text-white hover:text-green-400 relative">
                    <i class="fas fa-download mr-1"></i>Download All Previews
                </button>
                <button onclick="downloadPreview('card-preview-basic-all')"
                    class="text-white hover:text-gray-400 relative">
                    <i class="fas fa-download mr-1"></i>Download Basic Preview
                </button>
                <button onclick="downloadPreview('card-preview-gold-all')"
                    class="text-white hover:text-yellow-400 relative">
                    <i class="fas fa-download mr-1"></i>Download Gold Preview
                </button>
                <button onclick="downloadPreview('card-preview-rainbow-all')"
                    class="text-white hover:text-pink-400 relative">
                    <i class="fas fa-download mr-1"></i>Download Rainbow Preview
                </button>
                <button onclick="downloadPreview('card-preview-secret-all')"
                    class="text-white hover:text-red-400 relative">
                    <i class="fas fa-download mr-1"></i>Download Secret Preview
                </button>
                <button onclick="downloadPreview('card-preview-basic')"
                    class="text-white bg-gray-600 hover:bg-gray-700 relative rounded-lg p-1">
                    <i class="fas fa-download mr-1"></i>Download Basic Preview (Full)
                </button>
                <button onclick="downloadPreview('card-preview-gold')"
                    class="text-white bg-yellow-600 hover:bg-yellow-700 relative rounded-lg p-1">
                    <i class="fas fa-download mr-1"></i>Download Gold Preview (Full)
                </button>
                <button onclick="downloadPreview('card-preview-rainbow')"
                    class="text-white bg-pink-600 hover:bg-pink-700 relative rounded-lg p-1">
                    <i class="fas fa-download mr-1"></i>Download Rainbow Preview (Full)
                </button>
                <button onclick="downloadPreview('card-preview-secret')"
                    class="text-white bg-red-600 hover:bg-red-700 relative rounded-lg p-1">
                    <i class="fas fa-download mr-1"></i>Download Secret Preview (Full)
                </button>
            </div>
            <script>
                function downloadPreview(previewId) {
                    const spinner = document.getElementById('downloadSpinner');
                    spinner.classList.remove('hidden');
                    spinner.classList.add('flex');

                    const originalDiv = document.querySelector(`.${previewId}`);
                    const prewiewIdToStyle = ['card-preview-basic', 'card-preview-gold', 'card-preview-rainbow', 'card-preview-secret'];
                    if (prewiewIdToStyle.includes(previewId)) {
                        const fullCard = originalDiv.querySelector('.full-card');
                        if (fullCard) {
                            fullCard.style.display = 'block';
                            fullCard.style.transform = 'translate(-50%, -50%)';
                        }
                    }


                    htmlToImage.toPng(originalDiv, {
                            quality: 1,
                            pixelRatio: 2,
                            skipAutoScale: true,
                            cacheBust: true,
                            style: {
                                transformOrigin: 'top left',
                            }
                        })
                        .then(function(dataUrl) {
                            const link = document.createElement('a');
                            link.download = `anime_card.png`;
                            link.href = dataUrl;
                            link.click();
                            spinner.classList.remove('flex');
                            spinner.classList.add('hidden');
                            if (prewiewIdToStyle.includes(previewId)) {
                                const fullCard = originalDiv.querySelector('.full-card');
                                if (fullCard) {
                                    fullCard.style.display = 'none';
                                    fullCard.style.transform = 'translate(-140%, -100%)';
                                }
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                            spinner.classList.remove('flex');
                            spinner.classList.add('hidden');
                            showModal('errorModal', 'Error downloading card');
                        });
                }

                document.addEventListener('DOMContentLoaded', function() {

                    const saveButton = document.getElementById('save-button');
                    const editButton = document.getElementById('edit-button');
                    const urlParams = new URLSearchParams(window.location.search);
                    const editIndex = urlParams.get('edit');

                    if (editIndex !== null) {
                        saveButton.classList.add('hidden');
                        editButton.classList.remove('hidden');

                        fetch(`load_card.php?index=${editIndex}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data) {
                                    document.getElementById('name').value = data.name;
                                    document.getElementById('skill').value = data.skill;
                                    document.getElementById('description').value = data.description;
                                    document.getElementById('image').value = data.imageUrl || '';
                                    document.getElementById('probability').value = data.probability || '';
                                    document.getElementById('damage').value = data.damage || '';
                                    document.getElementById('hp').value = data.hp || '';
                                    document.getElementById('cardType').value = data.cardType;
                                    document.getElementById('cardNumber').value = data.cardNumber || '0';

                                    if (data.fonts) {
                                        ['name', 'skill', 'desc', 'stats'].forEach(type => {
                                            const fontKey = `${type}Font`;
                                            const fontSelect = document.getElementById(fontKey);
                                            const customInput = document.getElementById(`custom${fontKey}`);
                                            const applyButton = document.getElementById(`apply-${fontKey}`);
                                            const fontValue = data.fonts[fontKey];

                                            const isDefaultFont = type === 'stats' ?
                                                fontValue === 'Lilita One' :
                                                fontValue === 'Electrolize';

                                            if (!isDefaultFont) {
                                                fontSelect.value = 'custom';
                                                customInput.value = fontValue;
                                                customInput.classList.remove('hidden');
                                                applyButton.classList.remove('hidden');
                                            } else {
                                                fontSelect.value = fontValue;
                                            }

                                            applyFontToCard(type, fontValue);
                                        });
                                    }

                                    updateCard();
                                    updateFonts();

                                    editButton.addEventListener('click', function() {
                                        const cardData = {
                                            index: editIndex,
                                            name: document.getElementById('name').value.trim() || 'N/A',
                                            skill: document.getElementById('skill').value.trim() || 'N/A',
                                            description: document.getElementById('description').value.trim() || 'N/A',
                                            imageUrl: document.getElementById('card-image').src,
                                            probability: parseFloat(document.getElementById('probability').value) || 1,
                                            damage: document.getElementById('damage').value || '0',
                                            hp: document.getElementById('hp').value || '0',
                                            cardType: document.getElementById('cardType').value,
                                            cardNumber: parseInt(document.getElementById('cardNumber').value) || 0,
                                            fonts: {
                                                nameFont: document.getElementById('nameFont').value === 'custom' ?
                                                    document.getElementById('customnameFont').value || 'Electrolize' : document.getElementById('nameFont').value,
                                                skillFont: document.getElementById('skillFont').value === 'custom' ?
                                                    document.getElementById('customskillFont').value || 'Electrolize' : document.getElementById('skillFont').value,
                                                descFont: document.getElementById('descFont').value === 'custom' ?
                                                    document.getElementById('customdescFont').value || 'Electrolize' : document.getElementById('descFont').value,
                                                statsFont: document.getElementById('statsFont').value === 'custom' ?
                                                    document.getElementById('customstatsFont').value || 'Lilita One' : document.getElementById('statsFont').value
                                            }
                                            // ,
                                            // effects: {
                                            //     nameEffect: document.getElementById('nameEffect').value || 'none',
                                            //     skillEffect: document.getElementById('skillEffect').value || 'none'
                                            // }
                                        };

                                        fetch('update_card.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                },
                                                body: JSON.stringify(cardData)
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    showModal('successModal', 'Card updated successfully !');
                                                    setTimeout(() => {
                                                        window.location.href = '/collection.php';
                                                    }, 1500);
                                                }
                                            });
                                    });
                                }
                            });
                    }

                    if (saveButton) {
                        saveButton.addEventListener('click', function() {
                            try {
                                const imageInput = document.getElementById('image');
                                const cardData = {
                                    name: document.getElementById('name').value.trim() || 'N/A',
                                    skill: document.getElementById('skill').value.trim() || 'N/A',
                                    description: document.getElementById('description').value.trim() || 'N/A',
                                    imageUrl: document.getElementById('card-image').src,
                                    probability: parseFloat(document.getElementById('probability').value) || 1,
                                    damage: document.getElementById('damage').value || '0',
                                    hp: document.getElementById('hp').value || '0',
                                    cardType: document.getElementById('cardType').value,
                                    cardNumber: parseInt(document.getElementById('cardNumber').value) || 0,
                                    fonts: {
                                        nameFont: document.getElementById('nameFont').value === 'custom' ?
                                            document.getElementById('customnameFont').value || 'Electrolize' : document.getElementById('nameFont').value,
                                        skillFont: document.getElementById('skillFont').value === 'custom' ?
                                            document.getElementById('customskillFont').value || 'Electrolize' : document.getElementById('skillFont').value,
                                        descFont: document.getElementById('descFont').value === 'custom' ?
                                            document.getElementById('customdescFont').value || 'Electrolize' : document.getElementById('descFont').value,
                                        statsFont: document.getElementById('statsFont').value === 'custom' ?
                                            document.getElementById('customstatsFont').value || 'Lilita One' : document.getElementById('statsFont').value
                                    }
                                    // ,
                                    // effects: {
                                    //     nameEffect: document.getElementById('nameEffect').value || 'none',
                                    //     skillEffect: document.getElementById('skillEffect').value || 'none'
                                    // }
                                };

                                fetch('save_card.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(cardData)
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            showModal('successModal', 'Card saved successfully !');
                                            setTimeout(() => {
                                                window.location.href = '/collection.php';
                                            }, 1500);
                                        }
                                    });
                            } catch (error) {
                                console.log('Erreur : ' + error.message);
                            }
                        });
                    } else {
                        console.log('Bouton Save non trouvé !');
                    }

                    const defaultFonts = {
                        name: 'Electrolize',
                        skill: 'Electrolize',
                        desc: 'Electrolize',
                        stats: 'Lilita One'
                    };

                    Object.entries(defaultFonts).forEach(([type, font]) => {
                        applyFont(type, font);
                    });
                });


                function updateFonts() {
                    const elements = ['name', 'skill', 'desc', 'stats'];
                    elements.forEach(type => {
                        const select = document.getElementById(`${type}Font`);
                        const customInput = document.getElementById(`custom${type}Font`);
                        const applyButton = document.getElementById(`apply-${type}Font`);

                        if (select.value === 'custom') {
                            customInput.classList.remove('hidden');
                            applyButton.classList.remove('hidden');
                        } else {
                            customInput.classList.add('hidden');
                            applyButton.classList.add('hidden');
                            applyFont(type, select.value);
                        }
                    });
                }

                function applyFont(type) {
                    const customInput = document.getElementById(`custom${type}Font`);
                    const fontName = customInput.value.trim();
                    if (!fontName) return;

                    loadFont(fontName);

                    setTimeout(() => {
                        applyFontToCard(type, fontName);
                    }, 100);
                }

                function applyFontToCard(type, fontFamily) {
                    const cardData = {
                        name: {
                            element: 'card-name',
                            style: 'text-stroke-bolder'
                        },
                        skill: {
                            element: 'card-skill',
                            style: 'text-stroke'
                        },
                        desc: {
                            element: 'card-description',
                            style: 'text-stroke'
                        },
                        stats: {
                            element: ['card-damage', 'card-hp']
                        }
                    };

                    if (Array.isArray(cardData[type].element)) {
                        cardData[type].element.forEach(el => {
                            document.getElementById(el).style.fontFamily = `"${fontFamily}", sans-serif`;
                        });
                    } else {
                        document.getElementById(cardData[type].element).style.fontFamily = `"${fontFamily}", sans-serif`;
                    }
                }

                let loadedFonts = new Set();

                function loadFont(fontFamily) {
                    if (loadedFonts.has(fontFamily)) {
                        return;
                    }

                    const link = document.createElement('link');
                    link.href = `https://fonts.googleapis.com/css2?family=${fontFamily.replace(/ /g, '+')}`;
                    link.rel = 'stylesheet';
                    document.head.appendChild(link);
                    loadedFonts.add(fontFamily);
                }

                function handleFontSuggestions(input, suggestionsDivId) {
                    const suggestionsDiv = document.getElementById(suggestionsDivId);
                    const fontName = input.value.trim();

                    document.querySelectorAll('link[data-suggestion-font]').forEach(link => {
                        if (!loadedFonts.has(link.getAttribute('data-font-family'))) {
                            link.remove();
                        }
                    });

                    suggestionsDiv.innerHTML = '';

                    if (!fontName) {
                        const div = document.createElement('div');
                        div.className = 'p-2 text-gray-400';
                        div.textContent = 'Start typing to search fonts...';
                        suggestionsDiv.appendChild(div);
                        return;
                    }

                    fetch(`api/check_font.php?font=${encodeURIComponent(fontName)}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestionsDiv.innerHTML = '';

                            if (!data.suggestions || data.suggestions.length === 0) {
                                const div = document.createElement('div');
                                div.className = 'p-2 text-gray-400';
                                div.textContent = 'No matching fonts found';
                                suggestionsDiv.appendChild(div);
                                return;
                            }

                            data.suggestions.forEach(fontFamily => {
                                const linkId = `font-preview-${fontFamily.replace(/\s+/g, '-').toLowerCase()}`;

                                if (!document.getElementById(linkId)) {
                                    const link = document.createElement('link');
                                    link.id = linkId;
                                    link.href = `https://fonts.googleapis.com/css2?family=${fontFamily.replace(/ /g, '+')}`;
                                    link.rel = 'stylesheet';
                                    link.setAttribute('data-suggestion-font', 'true');
                                    link.setAttribute('data-font-family', fontFamily);
                                    document.head.appendChild(link);
                                }

                                const div = document.createElement('div');
                                div.className = 'p-4 text-white flex items-center justify-between transition-colors cursor-pointer hover:bg-purple-600';

                                const previewSpan = document.createElement('span');
                                previewSpan.style.fontFamily = fontFamily;
                                previewSpan.textContent = fontFamily;

                                const sampleText = document.createElement('span');
                                sampleText.style.fontFamily = fontFamily;
                                sampleText.className = 'text-gray-400';
                                sampleText.textContent = 'AaBbCc123';

                                div.onclick = () => {
                                    loadedFonts.add(fontFamily);
                                    input.value = fontFamily;
                                    suggestionsDiv.classList.add('hidden');
                                    applyFont(input.id.replace('custom', '').toLowerCase().replace('font', ''));
                                };

                                div.appendChild(previewSpan);
                                div.appendChild(sampleText);

                                suggestionsDiv.appendChild(div);
                            });
                        })
                        .catch(error => {
                            console.error('Error checking font:', error);
                            const div = document.createElement('div');
                            div.className = 'p-2 text-gray-400';
                            div.textContent = 'Error checking font availability';
                            suggestionsDiv.appendChild(div);
                        });

                    suggestionsDiv.classList.remove('hidden');
                }

                document.addEventListener('click', (e) => {
                    const suggestionsContainers = document.querySelectorAll('.suggestions-container');
                    suggestionsContainers.forEach(container => {
                        if (!container.contains(e.target)) {
                            container.classList.add('hidden');
                        }
                    });
                });
            </script>
        </div>

        <div id="downloadSpinner" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-purple-500"></div>
                <p class="text-white mt-4">Downloading card...</p>
            </div>
        </div>

        <div class="card-preview-all space-y-6 flex flex-col items-center">
            <div class="card-preview gradient-border-basic p-2 shadow-basic">
                <div id="card" class="mx-auto relative w-80 ">
                    <div class="gradient-content h-[500px] bg-black rounded-lg overflow-hidden">
                        <div class="card-image-box">
                            <img id="card-image" src="https://placehold.co/320x500" />
                        </div>
                        <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                            <span id="card-rarity">
                                BASIC
                            </span>
                        </div>
                        <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                            <span id="card-name" class="text-stroke-bolder">
                                N/A
                            </span>
                        </div>
                        <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                            <span id="card-preview-number">
                                #0
                            </span>
                        </div>
                        <div class="absolute bottom-16 left-2 right-2 px-2">
                            <p>
                                <span id="card-skill" class="text-xl text-white font-bold text-linear-gradient text-stroke">
                                    N/A
                                </span>
                            </p>
                            <p class="mt-3">
                                <span id="card-description" class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                    N/A
                                </span>
                            </p>
                        </div>
                        <div class="absolute bottom-2 w-full px-4 flex justify-between">
                            <div class="stat-dmg font-bold text-lg" id="card-damage">
                                DMG <span>0</span>
                            </div>
                            <div class="stat-hp font-bold text-lg" id="card-hp">
                                HP <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="all-rarity grid grid-cols-2 gap-10">
                <div class="gradient-border-basic p-1 shadow-basic rarity-card  card-preview-basic-all card-preview-basic" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="basic-image" alt="Basic rarity image"
                                    class="absolute inset-0 w-full h-full object-cover object-top opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40">

                            </div>
                            <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                                BASIC
                            </div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder" id="basic-probability">

                            </div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-basic p-2 shadow-basic">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="basic-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div class="absolute top-2 left-2 bg-basic text-black text-xs font-bold px-2 py-1 rounded">
                                    BASIC
                                </div>
                                <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="basic-full-name" class="text-stroke-bolder">
                                        N/A
                                    </span>
                                </div>
                                <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    <span id="card-basic-number">
                                        #0
                                    </span>
                                </div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p>
                                        <span id="basic-full-skill" class="text-xl text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                    <p class="mt-3 mb-12">
                                        <span id="basic-full-description" class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                </div>
                                <div id="stats-container" class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg" id="basic-full-damage">
                                        DMG <span>0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg" id="basic-full-hp">
                                        HP <span>0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-gold p-1 shadow-gold rarity-card card-preview-gold-all card-preview-gold" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="gold-image" alt="Gold rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40">

                            </div>
                            <div class="absolute top-2 left-2 bg-gold text-black text-xs font-bold px-2 py-1 rounded">
                                GOLD
                            </div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder" id="gold-probability">

                            </div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-gold p-2 shadow-gold">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="gold-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div class="absolute top-2 left-2 bg-gold text-black text-xs font-bold px-2 py-1 rounded">
                                    GOLD
                                </div>
                                <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="gold-full-name" class="text-stroke-bolder">
                                        N/A
                                    </span>
                                </div>
                                <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    <span id="card-gold-number">
                                        #0
                                    </span>
                                </div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p><span id="gold-full-skill"
                                            class="text-xl text-white font-bold text-linear-gradient text-stroke">N/A</span>
                                    </p>
                                    <p class="mt-3 mb-12">
                                        <span id="gold-full-description" class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                </div>
                                <div id="stats-container" class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg" id="gold-full-damage">
                                        DMG <span>0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg" id="gold-full-hp">
                                        HP <span>0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-rainbow p-1 shadow-rainbow rarity-card card-preview-rainbow-all card-preview-rainbow" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="rainbow-image" alt="Rainbow rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40">

                            </div>
                            <div
                                class="absolute top-2 left-2 bg-rainbow text-black text-xs font-bold px-2 py-1 rounded">
                                RAINBOW</div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder" id="rainbow-probability">

                            </div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-rainbow p-2 shadow-rainbow">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="rainbow-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div class="absolute top-2 left-2 bg-rainbow text-black text-xs font-bold px-2 py-1 rounded">
                                    RAINBOW
                                </div>
                                <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="rainbow-full-name" class="text-stroke-bolder">
                                        N/A
                                    </span>
                                </div>
                                <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    <span id="card-rainbow-number">
                                        #0
                                    </span>
                                </div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p>
                                        <span id="rainbow-full-skill" class="text-xl text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                    <p class="mt-3 mb-12">
                                        <span id="rainbow-full-description" class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                </div>
                                <div id="stats-container" class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg" id="rainbow-full-damage">
                                        DMG <span>0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg" id="rainbow-full-hp">
                                        HP <span>0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gradient-border-secret p-1 shadow-secret rarity-card card-preview-secret-all card-preview-secret" tabindex="0">
                    <div class="rarity-preview">
                        <div class="gradient-content w-40 h-40 bg-black rounded-lg overflow-hidden">
                            <div class="card-image-box">
                                <img id="secret-image" alt="Secret rarity image"
                                    class="absolute inset-0 w-full h-full object-cover opacity-80"
                                    src="https://placehold.co/160x160" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-40">

                            </div>
                            <div class="absolute top-2 left-2 bg-secret text-black text-xs font-bold px-2 py-1 rounded">
                                SECRET
                            </div>
                            <div class="absolute bottom-2 right-2 text-white text-sm font-bold text-stroke-bolder" id="secret-probability">

                            </div>
                        </div>
                    </div>
                    <div class="full-card">
                        <div class="gradient-border-secret p-2 shadow-secret">
                            <div class="gradient-content h-[500px] w-80 bg-black rounded-lg overflow-hidden">
                                <div class="card-image-box">
                                    <img id="secret-full-image" src="https://placehold.co/320x500" />
                                </div>
                                <div class="absolute top-2 left-2 bg-secret text-black text-xs font-bold px-2 py-1 rounded">
                                    SECRET
                                </div>
                                <div class="absolute top-8 left-2 text-white text-xl font-bold text-linear-gradient">
                                    <span id="secret-full-name" class="text-stroke-bolder">
                                        N/A
                                    </span>
                                </div>
                                <div class="absolute top-2 right-2 text-white text-xs font-bold text-linear-gradient">
                                    <span id="card-secret-number">
                                        #0
                                    </span>
                                </div>
                                <div class="absolute bottom-16 left-2 right-2 px-2">
                                    <p>
                                        <span id="secret-full-skill" class="text-xl text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                    <p class="mt-3 mb-12">
                                        <span id="secret-full-description" class="text-xs text-white font-bold text-linear-gradient text-stroke">
                                            N/A
                                        </span>
                                    </p>
                                </div>
                                <div id="stats-container" class="absolute bottom-2 w-full px-4 flex justify-between">
                                    <div class="stat-dmg font-bold text-lg" id="secret-full-damage">
                                        DMG <span>0</span>
                                    </div>
                                    <div class="stat-hp font-bold text-lg" id="secret-full-hp">
                                        HP <span>0</span>
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