<?php
/**
 * Real Concrete Bloom catalog — classical cast-stone pots.
 * Pieces with a pedestal are offered with base or pot-only.
 */
$products = [
  [
    'id' => 'heritage-ribbed',
    'name' => 'Heritage Ribbed Pot',
    'short' => 'Heritage Ribbed',
    'category' => 'Pots',
    'badge' => 'With optional base',
    'blurb' => 'Classical pot with carved rim and vertical ribbing—shown with a matching square pedestal.',
    'diff' => 'Vertical ribbing · carved oval rim · 17" × 16" pot',
    'pot_dims' => '17" L × 16" W',
    'base_dims' => '19" L × 16" W',
    'has_base' => true,
    'image' => 'assets/img/product-heritage-ribbed.jpg',
    'variants' => [
      [
        'label' => 'With pedestal base',
        'name' => 'Heritage Ribbed Pot with Base',
        'dims' => 'Pot 17" × 16" · Base 19" × 16"',
      ],
      [
        'label' => 'Pot only (no base)',
        'name' => 'Heritage Ribbed Pot (No Base)',
        'dims' => 'Pot 17" L × 16" W',
      ],
    ],
  ],
  [
    'id' => 'petal-garden',
    'name' => 'Petal Garden Pot',
    'short' => 'Petal Garden',
    'category' => 'Pots',
    'badge' => 'With optional base',
    'blurb' => 'Wide flared bowl with petal-style fluting around the body—compact footprint for beds and borders.',
    'diff' => 'Petal fluting · flared rim · 17" × 14" pot',
    'pot_dims' => '17" L × 14" W',
    'base_dims' => 'Matching square pedestal',
    'has_base' => true,
    'image' => 'assets/img/product-petal-garden.jpg',
    'variants' => [
      [
        'label' => 'With pedestal base',
        'name' => 'Petal Garden Pot with Base',
        'dims' => 'Pot 17" × 14" · with matching base',
      ],
      [
        'label' => 'Pot only (no base)',
        'name' => 'Petal Garden Pot (No Base)',
        'dims' => 'Pot 17" L × 14" W',
      ],
    ],
  ],
  [
    'id' => 'grand-scalloped',
    'name' => 'Grand Scalloped Pot',
    'short' => 'Grand Scalloped',
    'category' => 'Pots',
    'badge' => 'With optional base',
    'blurb' => 'Our widest bowl—scalloped rim and generous planting space, paired with a tall square pedestal.',
    'diff' => 'Scalloped rim · widest bowl · 19" × 26" pot',
    'pot_dims' => '19" L × 26" W',
    'base_dims' => '19" L × 16" W',
    'has_base' => true,
    'image' => 'assets/img/product-grand-scalloped.jpg',
    'variants' => [
      [
        'label' => 'With pedestal base',
        'name' => 'Grand Scalloped Pot with Base',
        'dims' => 'Pot 19" × 26" · Base 19" × 16"',
      ],
      [
        'label' => 'Pot only (no base)',
        'name' => 'Grand Scalloped Pot (No Base)',
        'dims' => 'Pot 19" L × 26" W',
      ],
    ],
  ],
];

function product_order_options(array $products): array {
  $opts = ['General inquiry'];
  foreach ($products as $p) {
    foreach ($p['variants'] as $v) {
      $opts[] = $v['name'];
    }
  }
  $opts[] = 'Custom size';
  return $opts;
}
