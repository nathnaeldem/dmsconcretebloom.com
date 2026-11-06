<?php
/**
 * Concrete Bloom catalog — three concrete art pots, sold as shown.
 */
$products = [
  [
    'id' => 'petal-garden',
    'name' => 'Petal Garden Pot',
    'short' => 'Petal Garden',
    'blurb' => 'Wide flared bowl with petal-style fluting—compact footprint for beds and borders.',
    'diff' => 'Petal fluting · flared rim · 17" × 14"',
    'dims' => '17" L × 14" W',
    'price' => 149,
    'image' => 'assets/img/product-petal-garden.jpg',
  ],
  [
    'id' => 'heritage-ribbed',
    'name' => 'Heritage Ribbed Pot',
    'short' => 'Heritage Ribbed',
    'blurb' => 'Classical pot with carved rim and vertical ribbing on a matching square pedestal.',
    'diff' => 'Vertical ribbing · carved rim · pot 17" × 16" · base 19" × 16"',
    'dims' => 'Pot 17" L × 16" W · Base 19" L × 16" W',
    'price' => 299,
    'image' => 'assets/img/product-heritage-ribbed.jpg',
  ],
  [
    'id' => 'grand-scalloped',
    'name' => 'Grand Scalloped Pot',
    'short' => 'Grand Scalloped',
    'blurb' => 'Our widest bowl—scalloped rim and generous planting space with a tall square pedestal.',
    'diff' => 'Scalloped rim · pot 19" × 26" · base 19" × 16"',
    'dims' => 'Pot 19" L × 26" W · Base 19" L × 16" W',
    'price' => 399,
    'image' => 'assets/img/product-grand-scalloped.jpg',
  ],
];

function product_order_options(array $products): array {
  $opts = ['General inquiry'];
  foreach ($products as $p) {
    $opts[] = $p['name'];
  }
  $opts[] = 'Custom size';
  return $opts;
}

function product_price_label(int $price): string {
  return '$' . number_format($price, 0);
}
