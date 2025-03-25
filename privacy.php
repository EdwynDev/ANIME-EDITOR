<?php
$pageTitle = "Privacy Policy";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12">
    <div class="glass-effect rounded-xl p-8 mb-8 container">
        <h1 class="text-3xl font-bold mb-8 flex items-center">
            <i class="fas fa-shield-alt mr-3"></i>Privacy Policy
        </h1>
        <div class="space-y-6 text-lg">
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-lock mr-2"></i>Data Collection
                </h2>
                <p>This editor does not collect any personal data. All card creation is done locally in your browser.</p>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-image mr-2"></i>Image Processing
                </h2>
                <p>Images uploaded are only stored temporarily in your browser's memory and are never sent to any server.</p>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-save mr-2"></i>Local Storage
                </h2>
                <p>We use local storage only to save your card designs if you choose to do so.</p>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>

<?php include 'includes/footer.php'; ?>