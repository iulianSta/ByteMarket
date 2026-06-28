<?php
require_once 'includes/functions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$products = getProducts();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $action = $_POST['action'] ?? 'add';

    if ($id > 0) {
        if ($action === 'add') {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        }

        if ($action === 'increase') {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        }

        if ($action === 'decrease' && isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]--;

            if ($_SESSION['cart'][$id] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }

        if ($action === 'remove') {
            unset($_SESSION['cart'][$id]);
        }
    }

    header('Location: cart.php');
    exit;
}

$cartItems = [];
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {
    $product = getProductById((int)$id);

    if ($product) {
        $subtotal = (float)$product['price'] * (int)$qty;
        $total += $subtotal;

        $cartItems[] = [
            'product' => $product,
            'qty' => (int)$qty,
            'subtotal' => $subtotal
        ];
    }
}

include 'includes/header.php';
?>

<main class="max-w-5xl mx-auto px-4 py-12">
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-accent mb-2">
            Shopping Cart
        </p>

        <h1 class="text-4xl font-bold mb-3">
            Your Cart
        </h1>

        <p class="text-muted">
            This cart uses a PHP session to store selected demo products during your visit.
        </p>
    </div>

    <?php if (empty($cartItems)): ?>
        <div class="bg-surface border border-white/5 rounded-2xl p-10 text-center">
            <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shopping-cart" class="w-8 h-8 text-accent"></i>
            </div>

            <h2 class="text-2xl font-bold mb-3">Your cart is empty</h2>

            <p class="text-muted mb-6">
                Add a few demo products from the shop to test the cart functionality.
            </p>

            <a href="products.php" class="inline-block bg-accent hover:bg-accent/80 text-white font-semibold px-6 py-3 rounded-lg transition">
                Browse Products
            </a>
        </div>
    <?php else: ?>

        <div class="space-y-4">
            <?php foreach ($cartItems as $item): 
                $product = $item['product'];
            ?>
                <div class="bg-surface border border-white/5 rounded-2xl p-4 flex flex-col md:flex-row md:items-center gap-5">
                    <img
                        src="<?= htmlspecialchars($product['image']) ?>"
                        alt="<?= htmlspecialchars($product['name']) ?>"
                        class="w-full md:w-28 h-32 md:h-28 object-cover rounded-xl"
                    >

                    <div class="flex-1">
                        <p class="text-xs uppercase tracking-wider text-muted mb-1">
                            <?= htmlspecialchars($product['category']) ?>
                        </p>

                        <h2 class="text-lg font-bold mb-1">
                            <?= htmlspecialchars($product['name']) ?>
                        </h2>

                        <p class="text-accent font-semibold">
                            $<?= number_format((float)$product['price'], 2) ?>
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">
                            <input type="hidden" name="action" value="decrease">
                            <button class="w-9 h-9 rounded-lg bg-bg border border-white/10 hover:border-accent/40 transition">
                                −
                            </button>
                        </form>

                        <span class="w-8 text-center font-semibold">
                            <?= (int)$item['qty'] ?>
                        </span>

                        <form method="POST">
                            <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">
                            <input type="hidden" name="action" value="increase">
                            <button class="w-9 h-9 rounded-lg bg-bg border border-white/10 hover:border-accent/40 transition">
                                +
                            </button>
                        </form>
                    </div>

                    <div class="text-right md:w-32">
                        <p class="text-xs text-muted mb-1">Subtotal</p>
                        <p class="font-bold text-lg">
                            $<?= number_format((float)$item['subtotal'], 2) ?>
                        </p>
                    </div>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?= (int)$product['id'] ?>">
                        <input type="hidden" name="action" value="remove">
                        <button class="text-muted hover:text-red-400 transition">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 bg-surface border border-white/5 rounded-2xl p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <p class="text-muted text-sm mb-1">Cart Total</p>
                <p class="text-3xl font-bold text-accent">
                    $<?= number_format((float)$total, 2) ?>
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="products.php" class="border border-white/10 hover:border-accent/40 text-txt font-semibold px-6 py-3 rounded-lg transition text-center">
                    Continue Shopping
                </a>

                <button
                    type="button"
                    class="bg-accent/40 text-white font-semibold px-6 py-3 rounded-lg cursor-not-allowed"
                    title="Checkout is disabled in this demo project"
                >
                    Checkout Disabled
                </button>
            </div>
        </div>

    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>