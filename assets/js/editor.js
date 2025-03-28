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
    const statsContainer = document.getElementById('stats-container');
    const allRarity = document.querySelector('.all-rarity');
    statsContainer.style.display = cardType === 'support' ? 'none' : 'grid';
    allRarity.style.display = 'grid';
    updateCard();
}

function formatCardNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
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
    const cardNumber = document.getElementById('cardNumber').value || '0';

    document.getElementById('card-name').innerText = name;
    document.getElementById('card-skill').innerText = skill;
    document.getElementById('card-description').innerText = description;
    if (cardType != 'support') {
            
        const dmgInput = document.getElementById(`damage`);
        const hpInput = document.getElementById(`hp`);
        
        dmgInput.parentElement.style.display = 'block';
        hpInput.parentElement.style.display = 'block';

        const dmgElement = document.getElementById('card-damage');
        const hpElement = document.getElementById('card-hp');

        dmgElement.style.display = 'block';
        hpElement.style.display = 'block';
    
        dmgElement.innerHTML = `DMG <span>${formatNumberWithSuffix(parseInt(damage))}</span>`;
        hpElement.innerHTML = `HP <span>${formatNumberWithSuffix(parseInt(hp))}</span>`;
    } else {
        const dmgElement = document.getElementById('card-damage');
        const hpElement = document.getElementById('card-hp');
        
        dmgElement.style.display = 'none';
        hpElement.style.display = 'none';
            
        const dmgInput = document.getElementById(`damage`);
        const hpInput = document.getElementById(`hp`);
        
        dmgInput.parentElement.style.display = 'none';
        hpInput.parentElement.style.display = 'none';
    }

    const formattedNumber = formatCardNumber(cardNumber);
    document.getElementById('card-preview-number').innerText = `#${formattedNumber}`;

    if (imageUrl) {
        updateAllImages(imageUrl);
    }

    updateProbabilities(probability);
    updateFullCards();
}

function updateFullCards() {
    const cardType = document.getElementById('cardType').value;
    const name = document.getElementById('name').value.trim() || 'N/A';
    const skill = document.getElementById('skill').value.trim() || 'N/A';
    const description = document.getElementById('description').value.trim() || 'N/A';
    const damage = document.getElementById('damage').value || '0';
    const hp = document.getElementById('hp').value || '0';
    const cardNumber = document.getElementById('cardNumber').value || '0';
    const rarities = ['basic', 'gold', 'rainbow', 'secret'];
    const multipliers = [1, 4, 16, 64];

    const formattedNumber = formatCardNumber(cardNumber);

    rarities.forEach((rarity, index) => {
        const multiplier = multipliers[index];
        document.getElementById(`card-${rarity}-number`).innerText = `#${formattedNumber}`;
        document.getElementById(`${rarity}-full-name`).innerText = name;
        document.getElementById(`${rarity}-full-skill`).innerText = skill;
        document.getElementById(`${rarity}-full-description`).innerText = description;
        if (cardType != 'support') {
            const dmgElement = document.getElementById(`${rarity}-full-damage`);
            const hpElement = document.getElementById(`${rarity}-full-hp`);
            dmgElement.style.display = 'block';
            hpElement.style.display = 'block';

    
            dmgElement.innerHTML = `DMG <span>${formatNumberWithSuffix(parseInt(damage) * multiplier)}</span>`;
            hpElement.innerHTML = `HP <span>${formatNumberWithSuffix(parseInt(hp) * multiplier)}</span>`;
        } else {
            const dmgElement = document.getElementById(`${rarity}-full-damage`);
            const hpElement = document.getElementById(`${rarity}-full-hp`);
    
            dmgElement.style.display = 'none';
            hpElement.style.display = 'none';
        }
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