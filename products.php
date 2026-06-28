<?php
require_once 'includes/functions.php';

$category = $_GET['category'] ?? 'all';
$search = $_GET['search'] ?? '';

$products = filterProducts(getProducts(), $category, $search);

include 'includes/header.php';
?>

<main class="max-w-7xl mx-auto px-4 py-10">

    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-accent mb-2">
            Shop
        </p>

        <h1 class="text-3xl md:text-4xl font-bold mb-3">
            Browse Products
        </h1>

        <p class="text-muted max-w-2xl">
            Search and filter demo products loaded from a JSON file and rendered dynamically with PHP.
        </p>
    </div>

    <form method="GET" class="flex flex-col sm:flex-row gap-4 mb-8">
        <input
            name="search"
            value="<?= htmlspecialchars($search) ?>"
            placeholder="Search products..."
            class="bg-surface border border-white/10 rounded-lg px-4 py-2.5 text-sm flex-1 focus:outline-none focus:border-accent"
        >

        <select
            name="category"
            class="bg-surface border border-white/10 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-accent"
        >
            <option value="all" <?= $category === 'all' ? 'selected' : '' ?>>All Categories</option>
            <option value="laptops" <?= $category === 'laptops' ? 'selected' : '' ?>>Laptops</option>
            <option value="components" <?= $category === 'components' ? 'selected' : '' ?>>Components</option>
            <option value="peripherals" <?= $category === 'peripherals' ? 'selected' : '' ?>>Peripherals</option>
            <option value="networking" <?= $category === 'networking' ? 'selected' : '' ?>>Networking</option>
        </select>

        <button
            type="submit"
            class="bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-2.5 rounded-lg transition"
        >
            Search
        </button>
    </form>

    <?php if (empty($products)): ?>
        <div class="bg-surface border border-white/5 rounded-xl p-10 text-center">
            <p class="text-muted">No products found.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <a href="product.php?id=<?= (int)$product['id'] ?>"
                   class="group bg-surface rounded-xl overflow-hidden border border-white/5 hover:border-accent/30 transition">

                    <div class="aspect-[4/3] overflow-hidden">
                        <img
                            src="<?= htmlspecialchars($product['image']) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            loading="lazy"
                        >
                    </div>

                    <div class="p-4">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <h3 class="font-semibold text-sm">
                                <?= htmlspecialchars($product['name']) ?>
                            </h3>

                            <span class="text-xs uppercase tracking-wider text-muted">
                                <?= htmlspecialchars($product['category']) ?>
                            </span>
                        </div>

                        <p class="text-muted text-sm mb-3 line-clamp-2">
                            <?= htmlspecialchars($product['description']) ?>
                        </p>

                        <p class="text-accent font-bold">
                            $<?= number_format((float)$product['price'], 2) ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</main>

<?php include 'includes/footer.php'; ?>