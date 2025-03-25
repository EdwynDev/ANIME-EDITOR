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

function handleImageUpload() {
    const fileInput = document.getElementById('image-upload');
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imageUrl = e.target.result;
            updateAllImages(imageUrl);
        };
        reader.readAsDataURL(file);
    }
}

function updateCardType() {
    const cardType = document.getElementById('cardType').value;
    const statsContainer = document.getElementById('stats-container');
    const goldCard = document.querySelector('.gradient-border-gold').parentElement;
    const rainbowCard = document.querySelector('.gradient-border-rainbow').parentElement;
    const secretCard = document.querySelector('.gradient-border-secret').parentElement;
    const statsDisplays = document.querySelectorAll('.bottom-2.w-full.px-4.flex.justify-between');

    if (cardType === 'support') {
        statsContainer.style.display = 'none';
        goldCard.style.display = 'none';
        rainbowCard.style.display = 'none';
        secretCard.style.display = 'none';
        statsDisplays.forEach(display => {
            display.style.display = 'none';
        });
    } else {
        statsContainer.style.display = 'grid';
        goldCard.style.display = 'grid';
        rainbowCard.style.display = 'grid';
        secretCard.style.display = 'grid';
        statsDisplays.forEach(display => {
            display.style.display = 'flex';
        });
    }
    updateCard();
}

function updateCard() {
    const cardType = document.getElementById('cardType').value;
    const name = document.getElementById('name').value.trim() || 'N/A';
    const skill = document.getElementById('skill').value.trim() || 'N/A';
    const description = document.getElementById('description').value.trim() || 'N/A';
    const imageUrl = document.getElementById('image').value.trim();
    const probability = parseFloat(document.getElementById('probability').value) || 1;
    const damage = document.getElementById('damage').value || '0';
    const hp = document.getElementById('hp').value || '0';

    document.getElementById('card-name').innerText = name;
    document.getElementById('card-skill').innerText = skill;
    document.getElementById('card-description').innerText = description;
    document.getElementById('card-damage').innerText = formatNumberWithSuffix(parseInt(damage));
    document.getElementById('card-hp').innerText = formatNumberWithSuffix(parseInt(hp));

    if (imageUrl) {
        updateAllImages(imageUrl);
    }

    updateProbabilities(probability);
    updateFullCards();

    if (cardType === 'support') {
        document.getElementById('card-damage').parentElement.parentElement.style.display = 'none';
    } else {
        document.getElementById('card-damage').parentElement.parentElement.style.display = 'flex';
    }
}

function updateFullCards() {
    const name = document.getElementById('name').value.trim() || 'N/A';
    const skill = document.getElementById('skill').value.trim() || 'N/A';
    const description = document.getElementById('description').value.trim() || 'N/A';
    const damage = document.getElementById('damage').value || '0';
    const hp = document.getElementById('hp').value || '0';

    const rarities = ['basic', 'gold', 'rainbow', 'secret'];
    const multipliers = [1, 4, 16, 64];

    rarities.forEach((rarity, index) => {
        const multiplier = multipliers[index];
        document.getElementById(`${rarity}-full-name`).innerText = name;
        document.getElementById(`${rarity}-full-skill`).innerText = skill;
        document.getElementById(`${rarity}-full-description`).innerText = description;
        document.getElementById(`${rarity}-full-damage`).innerText = formatNumberWithSuffix(parseInt(damage) * multiplier);
        document.getElementById(`${rarity}-full-hp`).innerText = formatNumberWithSuffix(parseInt(hp) * multiplier);
    });
}

function updateAllImages(imageUrl) {
    const images = [
        'card-image',
        'basic-image', 'basic-full-image',
        'gold-image', 'gold-full-image',
        'rainbow-image', 'rainbow-full-image',
        'secret-image', 'secret-full-image'
    ];

    images.forEach(id => {
        document.getElementById(id).src = imageUrl;
    });
}

function updateProbabilities(baseProbability) {
    document.getElementById('basic-probability').innerText = formatNumberWithSuffix(baseProbability);
    document.getElementById('gold-probability').innerText = formatNumberWithSuffix(baseProbability * 100);
    document.getElementById('rainbow-probability').innerText = formatNumberWithSuffix(baseProbability * 10000);
    document.getElementById('secret-probability').innerText = formatNumberWithSuffix(baseProbability * 1000000);
}

updateProbabilities(1);

document.addEventListener('DOMContentLoaded', function () {
    updateCardType();
    updateCard();
});

document.addEventListener('DOMContentLoaded', function () {
    const saveButton = document.getElementById('save-button');
    const loadButton = document.getElementById('load-button');

    saveButton.addEventListener('click', function () {
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

    loadButton.addEventListener('click', function () {
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

document.addEventListener('DOMContentLoaded', function () {
    const saveButton = document.getElementById('save-button');

    saveButton.addEventListener('click', function () {
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

        fetch('save_card.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cardData)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Card saved successfully!');
                window.location.reload(); // Recharge la page pour mettre à jour la liste
            }
        });
    });
});