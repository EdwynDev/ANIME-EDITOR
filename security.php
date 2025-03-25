<?php
$pageTitle = "Security";
include 'includes/header.php';
?>

<div class="container mx-auto pt-8 px-6 pb-12 mt-12">
    <div class="glass-effect rounded-xl p-8 mb-8 container">
        <h1 class="text-3xl font-bold mb-8 flex items-center text-purple-300">
            <i class="fas fa-shield-alt mr-3"></i>Security Information
        </h1>
        <div class="space-y-6 text-lg">
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-headset mr-2"></i>Contact Security Team
                </h2>
                <p class="text-white">For security concerns, please contact: <a href="mailto:contact.edwyn@gmail.com" class="text-purple-400 hover:text-purple-300">contact.edwyn@gmail.com</a></p>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-shield-alt mr-2"></i>Security Features
                </h2>
                <ul class="list-none space-y-2 text-white">
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>All data processing is done locally in your browser</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>No sensitive information is collected or stored</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Images are processed client-side only</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Strong Content Security Policy (CSP) implementation</li>
                    <li><i class="fas fa-check-circle text-green-500 mr-2"></i>Regular security audits and updates</li>
                </ul>
            </div>
            <div class="glass-effect p-4 rounded-lg">
                <h2 class="text-xl font-bold mb-3 text-purple-300">
                    <i class="fas fa-bug mr-2"></i>Responsible Disclosure
                </h2>
                <p class="text-white">If you discover a security vulnerability, please report it to our security team. We appreciate your help in keeping our application secure.</p>
            </div>
        </div>
    </div>
    <a href="/" class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-8">
        <i class="fas fa-arrow-left mr-2"></i>Back to Editor
    </a>
</div>

<?php include 'includes/footer.php'; ?>