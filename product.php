<?php
require_once 'includes/functions.php';

$id = (int)($_GET['id'] ?? 0);
$product = getProductById($id);

include 'includes/header.php';

if (!$product): ?>
    <main class="max-w-7xl mx-auto px-4 py-16">
        <div class="bg-surface border border-white/5 rounded-xl p-10 text-center">
            <h1 class="text-2xl font-bold mb-3">Product not found</h1>
            <p class="text-muted mb-6">The product you are looking for does not exist or is no longer available.</p>
            <a href="products.php" class="inline-block bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-3 rounded-lg transition">
                Back to Shop
            </a>
        </div>
    </main>

<?php
include 'includes/footer.php';
exit;
endif;
?>

<main class="max-w-7xl mx-auto px-4 py-10">

    <a href="products.php" class="text-muted hover:text-txt text-sm mb-8 inline-flex items-center gap-2">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to Shop
    </a>

    <div class="grid md:grid-cols-2 gap-10 items-start">

        <div class="bg-surface rounded-2xl overflow-hidden border border-white/5">
            <img
                src="<?= htmlspecialchars($product['image']) ?>"
                alt="<?= htmlspecialchars($product['name']) ?>"
                class="w-full aspect-[4/3] object-cover"
                loading="lazy"
            >
        </div>

        <div class="space-y-6">
            <div>
                <span class="text-xs uppercase tracking-wider text-muted">
                    <?= htmlspecialchars($product['category']) ?>
                </span>

                <h1 class="text-3xl md:text-4xl font-bold mt-2 mb-4">
                    <?= htmlspecialchars($product['name']) ?>
                </h1>

                <p class="text-3xl text-accent font-bold">
                    $<?= number_format((float)$product['price'], 2) ?>
                </p>
            </div>

            <p class="text-muted leading-relaxed">
                <?= htmlspecialchars($product['description']) ?>
            </p>

            <div class="grid sm:grid-cols-3 gap-4">
                <div class="bg-surface border border-white/5 rounded-xl p-4">
                    <p class="text-xs text-muted mb-1">Availability</p>
                    <p class="font-semibold text-green-400">In Stock</p>
                </div>

                <div class="bg-surface border border-white/5 rounded-xl p-4">
                    <p class="text-xs text-muted mb-1">Category</p>
                    <p class="font-semibold capitalize"><?= htmlspecialchars($product['category']) ?></p>
                </div>

                <div class="bg-surface border border-white/5 rounded-xl p-4">
                    <p class="text-xs text-muted mb-1">SKU</p>
                    <p class="font-semibold">BM-<?= str_pad((string)$product['id'], 4, '0', STR_PAD_LEFT) ?></p>
                </div>
            </div>

            <form method="POST" action="cart.php" class="flex flex-col sm:flex-row gap-3">
                <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">
                <input type="hidden" name="action" value="add">

                <button
                    type="submit"
                    class="bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-3 rounded-lg transition flex items-center justify-center gap-2"
                >
                    <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                    Add to Cart
                </button>

                <a
                    href="products.php?category=<?= urlencode($product['category']) ?>"
                    class="border border-white/10 hover:border-accent/40 text-txt font-semibold px-6 py-3 rounded-lg transition text-center"
                >
                    More in this category
                </a>
            </form>
        </div>

    </div>

</main>

<?php include 'includes/footer.php'; ?>