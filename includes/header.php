<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cartCount = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += (int)$item;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteMarket</title>

    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.0/dist/umd/lucide.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: '#111114',
                        surface: '#18181C',
                        accent: '#3898EC',
                        txt: '#F0F0F2',
                        muted: '#8A8A9A'
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-bg text-txt min-h-screen w-full">

<nav class="sticky top-0 z-50 bg-surface/95 backdrop-blur border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-4">

        <a href="index.php" class="text-xl font-bold text-accent shrink-0">
            ByteMarket
        </a>

        <div class="hidden md:flex items-center gap-6">
            <a href="index.php" class="text-sm text-muted hover:text-txt transition">Home</a>
            <a href="products.php" class="text-sm text-muted hover:text-txt transition">Shop</a>
            <a href="index.php#about" class="text-sm text-muted hover:text-txt transition">About</a>
            <a href="contact.php" class="text-sm text-muted hover:text-txt transition">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            <form action="products.php" method="GET" class="relative hidden sm:block">
                <input
                    name="search"
                    type="text"
                    placeholder="Search products..."
                    class="bg-bg border border-white/10 rounded-lg px-3 py-1.5 text-sm w-40 focus:w-56 transition-all focus:outline-none focus:border-accent"
                >
            </form>

            <a href="cart.php" class="relative p-2 hover:text-accent transition">
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>

                <?php if ($cartCount > 0): ?>
                    <span class="absolute -top-0.5 -right-0.5 bg-accent text-white text-xs w-4 h-4 rounded-full flex items-center justify-center">
                        <?= $cartCount ?>
                    </span>
                <?php endif; ?>
            </a>

            <button id="mobile-menu-btn" class="md:hidden p-2">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-2">
        <a href="index.php" class="block text-sm text-muted hover:text-txt">Home</a>
        <a href="products.php" class="block text-sm text-muted hover:text-txt">Shop</a>
        <a href="index.php#about" class="block text-sm text-muted hover:text-txt">About</a>
        <a href="contact.php" class="block text-sm text-muted hover:text-txt">Contact</a>

        <form action="products.php" method="GET">
            <input
                name="search"
                type="text"
                placeholder="Search..."
                class="bg-bg border border-white/10 rounded-lg px-3 py-1.5 text-sm w-full focus:outline-none focus:border-accent mt-2"
            >
        </form>
    </div>
</nav>