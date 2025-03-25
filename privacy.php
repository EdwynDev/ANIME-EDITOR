<?php
$pageTitle = "Privacy Policy";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="glass-effect rounded-xl p-8 mb-8 container">
        <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
            <i class="fas fa-user-shield mr-3"></i>
        </h1>
        <div class="space-y-6 text-lg">
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-database mr-2"></i>Data Collection & Storage
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>No personal data collection</li>
                    <li>No cookies used</li>
                    <li>No tracking or analytics</li>
                    <li>All data stays in your browser</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-image mr-2"></i>Image Handling
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>Images processed locally in browser</li>
                    <li>No image uploading to servers</li>
                    <li>Images stored in session only</li>
                    <li>Cleared when browser closes</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-user-secret mr-2"></i>Your Privacy
                </h2>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>No account required</li>
                    <li>No personal information needed</li>
                    <li>No data sharing with third parties</li>
                    <li>Complete privacy guaranteed</li>
                </ul>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>
<?php include 'includes/footer.php'; ?>