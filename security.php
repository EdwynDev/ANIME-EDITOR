<?php
$pageTitle = "Security Information";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="glass-effect rounded-xl p-8 mb-8 container">
        <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
            <i class="fas fa-lock mr-3"></i>
        </h1>
        <div class="space-y-6 text-lg">
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-database mr-2"></i>Data Storage
                </h2>
                <p class="text-white mb-2">Your card collection is stored in:</p>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>Browser session storage only</li>
                    <li>No server-side storage</li>
                    <li>Data is cleared when closing browser</li>
                    <li>Regular backups recommended</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-shield-alt mr-2"></i>Local Processing
                </h2>
                <ul class="list-none space-y-2 text-white">
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>All card creation is processed locally</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>No data transmission to external servers</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Images are handled in-browser only</li>
                </ul>
            </div>

            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Important Notice
                </h2>
                <p class="text-white">Please be aware that:</p>
                <ul class="list-disc pl-6 text-white space-y-1">
                    <li>Browser data clearing will erase your collection</li>
                    <li>Session expiration results in data loss</li>
                    <li>No recovery option available</li>
                </ul>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>
<?php include 'includes/footer.php'; ?>