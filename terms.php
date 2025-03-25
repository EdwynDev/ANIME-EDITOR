<?php
$pageTitle = "Terms of Service";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="glass-effect rounded-xl p-8 mb-8 container">
        <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
            <i class="fas fa-gavel mr-3"></i>Terms of Service
        </h1>
        <div class="space-y-6 text-lg">
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-gamepad mr-2"></i>Editor Usage
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>This is a fan-made card editor tool</li>
                    <li>Not affiliated with any official game</li>
                    <li>Created cards are for personal use only</li>
                    <li>Not for commercial purposes</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-copyright mr-2"></i>Image Usage
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>Only use images you have rights to</li>
                    <li>Respect copyright laws</li>
                    <li>No illegal or inappropriate content</li>
                    <li>We are not responsible for user-uploaded content</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-exclamation-circle mr-2"></i>Data Management
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>Your data is stored locally only</li>
                    <li>No guarantee of data persistence</li>
                    <li>Make your own backups if needed</li>
                    <li>We are not responsible for data loss</li>
                </ul>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>
<?php include 'includes/footer.php'; ?>