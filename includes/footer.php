<footer class="bg-surface border-t border-white/5 mt-16">
    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <span class="text-lg font-bold text-accent">ByteMarket</span>
            <p class="text-muted text-sm mt-2">
                Demo e-commerce project built for portfolio purposes.
            </p>
        </div>

        <div>
            <h4 class="font-semibold mb-3 text-sm">Quick Links</h4>
            <div class="space-y-1.5 text-sm text-muted">
                <a href="index.php" class="block hover:text-txt transition">Home</a>
                <a href="products.php" class="block hover:text-txt transition">Shop</a>
                <a href="index.php#about" class="block hover:text-txt transition">About</a>
                <a href="contact.php" class="block hover:text-txt transition">Contact</a>
            </div>
        </div>

        <div>
            <h4 class="font-semibold mb-3 text-sm">Legal</h4>
            <div class="space-y-1.5 text-sm text-muted">
                <a href="privacy.php" class="block hover:text-txt transition">Privacy Policy</a>
                <a href="terms.php" class="block hover:text-txt transition">Terms & Conditions</a>
                <a href="legal-notice.php" class="block hover:text-txt transition">Legal Notice</a>
            </div>
        </div>
    </div>

    <div class="border-t border-white/5 py-4 text-center">
        <p class="text-muted text-xs">
            © <?= date('Y') ?> ByteMarket. Portfolio demo project. No commercial transactions are processed.
        </p>
    </div>
</footer>

<script>
    lucide.createIcons();

    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
</script>

</body>
</html>