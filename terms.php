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
                    <i class="fas fa-user mr-2"></i>Fan Use
                </h2>
                <p class="text-white">This editor is provided for fan use only. Created cards are not official game content.</p>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-copyright mr-2"></i>Copyright
                </h2>
                <p class="text-white">Users must respect copyright and intellectual property rights when uploading images.</p>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-exclamation-circle mr-2"></i>Disclaimer
                </h2>
                <p class="text-white">The editor is provided "as is" without any warranties.</p>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>

<?php include 'includes/footer.php'; ?>