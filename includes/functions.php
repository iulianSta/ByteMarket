<?php

function getProducts(): array {
    $json = file_get_contents(__DIR__ . '/../data/products.json');
    return json_decode($json, true) ?? [];
}

function getProductById(int $id): ?array {
    foreach (getProducts() as $product) {
        if ((int)$product['id'] === $id) {
            return $product;
        }
    }
    return null;
}

function filterProducts(array $products, string $category = 'all', string $search = ''): array {
    return array_filter($products, function ($product) use ($category, $search) {
        $matchCategory = $category === 'all' || $product['category'] === $category;

        $text = strtolower($product['name'] . ' ' . $product['description'] . ' ' . $product['category']);
        $matchSearch = $search === '' || str_contains($text, strtolower($search));

        return $matchCategory && $matchSearch;
    });
}