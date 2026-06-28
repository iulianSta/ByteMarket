<?php 
require_once 'includes/functions.php';

$products = getProducts();
$featuredProducts = array_slice($products, 0, 4);

include 'includes/header.php'; 
?>

<section class="relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 py-20 md:py-32 flex flex-col md:flex-row items-center gap-10">
        <div class="flex-1 space-y-6">
            <p class="text-sm font-semibold uppercase tracking-wider text-accent">
                Demo E-Commerce Project
            </p>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                ByteMarket – IT hardware and electronics store
            </h1>

            <p class="text-muted text-lg max-w-md">
                A portfolio e-commerce project built with PHP, JSON product data, search, category filtering, product pages and a simple cart flow.
            </p>

            <a href="products.php" class="inline-block bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-3 rounded-lg transition">
                Browse Products
            </a>
        </div>

        <div class="flex-1 max-w-lg">
            <img
                src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=1000"
                alt="Modern workspace with electronics"
                class="w-full rounded-2xl shadow-2xl shadow-accent/10"
                loading="lazy"
            >
        </div>
    </div>
</section>

<section id="about" class="bg-surface py-10 border-y border-white/5">
    <div class="max-w-7xl mx-auto px-4">
        <p class="text-sm text-muted leading-relaxed">
            ByteMarket is a non-commercial portfolio project created to demonstrate practical web development skills.
            The project focuses on product data handling, reusable PHP includes, search and category filtering, dynamic product pages and basic e-commerce structure.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-2xl font-bold mb-8 text-center">
        Shop by Category
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="products.php?category=laptops" class="group relative rounded-xl overflow-hidden aspect-square bg-surface border border-white/5">
            <img src="https://images.pexels.com/photos/18105/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Laptops">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-4">
                <span class="font-semibold">Laptops</span>
            </div>
        </a>

        <a href="products.php?category=components" class="group relative rounded-xl overflow-hidden aspect-square bg-surface border border-white/5">
            <img src="https://images.pexels.com/photos/2582937/pexels-photo-2582937.jpeg?auto=compress&cs=tinysrgb&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Components">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-4">
                <span class="font-semibold">Components</span>
            </div>
        </a>

        <a href="products.php?category=peripherals" class="group relative rounded-xl overflow-hidden aspect-square bg-surface border border-white/5">
            <img src="https://images.pexels.com/photos/2115256/pexels-photo-2115256.jpeg?auto=compress&cs=tinysrgb&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Peripherals">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-4">
                <span class="font-semibold">Peripherals</span>
            </div>
        </a>

        <a href="products.php?category=networking" class="group relative rounded-xl overflow-hidden aspect-square bg-surface border border-white/5">
            <img src="https://images.pexels.com/photos/2881232/pexels-photo-2881232.jpeg?auto=compress&cs=tinysrgb&w=800" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="Networking">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-4">
                <span class="font-semibold">Networking</span>
            </div>
        </a>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-2xl font-bold mb-8 text-center">
        Featured Products
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($featuredProducts as $product): ?>
            <a href="product.php?id=<?= (int)$product['id'] ?>" class="group bg-surface rounded-xl overflow-hidden border border-white/5 hover:border-accent/30 transition">
                <div class="aspect-[4/3] overflow-hidden">
                    <img
                        src="<?= htmlspecialchars($product['image']) ?>"
                        alt="<?= htmlspecialchars($product['name']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        loading="lazy"
                    >
                </div>

                <div class="p-4">
                    <h3 class="font-semibold text-sm mb-1">
                        <?= htmlspecialchars($product['name']) ?>
                    </h3>

                    <p class="text-accent font-bold">
                        $<?= number_format((float)$product['price'], 2) ?>
                    </p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<section class="bg-surface py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-10 text-center">
            Why Choose ByteMarket?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center space-y-3">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center mx-auto">
                    <i data-lucide="database" class="w-6 h-6 text-accent"></i>
                </div>
                <h3 class="font-semibold">JSON Product Data</h3>
                <p class="text-muted text-sm">Products are loaded from structured JSON and rendered dynamically with PHP.</p>
            </div>

            <div class="text-center space-y-3">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center mx-auto">
                    <i data-lucide="search" class="w-6 h-6 text-accent"></i>
                </div>
                <h3 class="font-semibold">Search & Filtering</h3>
                <p class="text-muted text-sm">The shop supports basic keyword search and category-based filtering.</p>
            </div>

            <div class="text-center space-y-3">
                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center mx-auto">
                    <i data-lucide="layout-template" class="w-6 h-6 text-accent"></i>
                </div>
                <h3 class="font-semibold">Reusable PHP Structure</h3>
                <p class="text-muted text-sm">Header, footer and helper functions are separated into reusable PHP files.</p>
            </div>
        </div>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 py-16 text-center">
    <h2 class="text-2xl font-bold mb-3">
        Project Demo
    </h2>

    <p class="text-muted mb-6">
        This project is built for portfolio purposes and does not process real orders or payments.
    </p>

    <a href="products.php" class="inline-block bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-3 rounded-lg transition">
        View Shop
    </a>
</section>

<?php include 'includes/footer.php'; ?>