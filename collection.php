<?php
$page_title = 'Collection';
$page_description = 'Explore Concrete Bloom handcrafted architectural concrete planters—urns, cylinders, troughs, and custom cast pieces.';
require_once __DIR__ . '/includes/header.php';

$filter = isset($_GET['cat']) ? trim($_GET['cat']) : '';
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

$planters = [
  [
    'name' => 'The Monolith Urn',
    'category' => 'Urns',
    'badge' => 'Urns & Vessels',
    'dims' => '36" Dia × 32" H · Residential / Patio',
    'dims_raw' => '36" Dia x 32" H',
    'price' => 620,
    'weight' => 320,
    'drain' => 'Dual Drain',
    'image' => 'assets/img/product-monolith-urn.jpg',
  ],
  [
    'name' => 'The Brutalist Trough',
    'category' => 'Troughs',
    'badge' => 'Modular Troughs',
    'dims' => '72"L × 24"W × 24"H · Commercial Perimeter',
    'dims_raw' => '72"L x 24"W x 24"H',
    'price' => 850,
    'weight' => 510,
    'drain' => 'Quad Drain',
    'image' => 'assets/img/cat-troughs.jpg',
  ],
  [
    'name' => 'The Zenith Cylinder',
    'category' => 'Cylinders',
    'badge' => 'Cylinders',
    'dims' => '30" Dia × 30" H · Minimalist Patio',
    'dims_raw' => '30" Dia x 30" H',
    'price' => 490,
    'weight' => 260,
    'drain' => 'Single Drain',
    'image' => 'assets/img/cat-cylinders.jpg',
  ],
  [
    'name' => 'The Cascade Planter',
    'category' => 'Custom',
    'badge' => 'Custom Cast',
    'dims' => '48"L × 48"W × 20"H · Plaza Centerpiece',
    'dims_raw' => '48"L x 48"W x 20"H',
    'price' => 780,
    'weight' => 410,
    'drain' => 'Dual Drain',
    'image' => 'assets/img/cat-benches.jpg',
  ],
  [
    'name' => 'The Courtyard Bowl',
    'category' => 'Urns',
    'badge' => 'Urns & Vessels',
    'dims' => '42" Dia × 22" H · Courtyard Focal',
    'dims_raw' => '42" Dia x 22" H',
    'price' => 540,
    'weight' => 290,
    'drain' => 'Dual Drain',
    'image' => 'assets/img/cat-urns.jpg',
  ],
  [
    'name' => 'The Lobby Pair',
    'category' => 'Cylinders',
    'badge' => 'Cylinders',
    'dims' => '24" Dia × 36" H · Entry Pair',
    'dims_raw' => '24" Dia x 36" H',
    'price' => 710,
    'weight' => 380,
    'drain' => 'Single Drain',
    'image' => 'assets/img/cat-cylinders.jpg',
  ],
];

$filtered = array_values(array_filter($planters, function ($p) use ($filter, $query) {
  if ($filter !== '' && $filter !== 'Custom' && strcasecmp($p['category'], $filter) !== 0) {
    if (!($filter === 'Benches' && $p['category'] === 'Custom')) {
      return false;
    }
  }
  if ($filter === 'Custom' && $p['category'] !== 'Custom') {
    return false;
  }
  if ($query !== '') {
    $hay = strtolower($p['name'] . ' ' . $p['badge'] . ' ' . $p['dims']);
    if (strpos($hay, strtolower($query)) === false) {
      return false;
    }
  }
  return true;
}));
?>

<main class="page-wrap">
  <header class="page-hero">
    <div class="container reveal">
      <span class="section-kicker">Handcrafted Catalog</span>
      <h1>Property / <span class="accent">Collection</span></h1>
      <p>
        Every piece is hand-cast to elevate exterior décor—and built heavy enough to stay anchored
        through Dallas wind and storm weather.
      </p>
      <?php if ($filter !== '' || $query !== ''): ?>
        <p class="mt-3" style="color:var(--brand);font-weight:600;font-size:0.85rem;">
          Showing
          <?php
          $bits = [];
          if ($filter !== '') $bits[] = htmlspecialchars($filter);
          if ($query !== '') $bits[] = '“' . htmlspecialchars($query) . '”';
          echo implode(' · ', $bits);
          ?>
          — <a href="collection.php" style="text-decoration:underline;">Clear filters</a>
        </p>
      <?php endif; ?>
    </div>
  </header>

  <section class="section" style="padding-top:0.5rem;">
    <div class="container">
      <div class="d-flex flex-wrap gap-2 mb-4 reveal">
        <?php
        $cats = ['' => 'All', 'Urns' => 'Urns', 'Cylinders' => 'Cylinders', 'Troughs' => 'Troughs', 'Custom' => 'Custom'];
        foreach ($cats as $key => $label):
          $active = ($filter === $key) || ($key === '' && $filter === '');
        ?>
          <a
            class="<?php echo $active ? 'btn-primary-solid' : 'btn-outline-brand'; ?>"
            href="collection.php<?php echo $key !== '' ? '?cat=' . urlencode($key) : ''; ?>"
            style="padding:0.55rem 1.1rem;font-size:0.75rem;"
          ><?php echo htmlspecialchars($label); ?></a>
        <?php endforeach; ?>
      </div>

      <?php if (count($filtered) === 0): ?>
        <div class="aging-box reveal text-center">
          <h3>No pieces matched</h3>
          <p>Try another category or <a href="collection.php" style="color:var(--brand);font-weight:600;">view the full collection</a>.</p>
        </div>
      <?php else: ?>
        <div class="product-grid">
          <?php foreach ($filtered as $i => $p): ?>
            <article class="product-card reveal<?php echo $i ? ' reveal-delay-' . min($i, 3) : ''; ?>">
              <div class="product-media">
                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                <span class="product-badge"><?php echo htmlspecialchars($p['badge']); ?></span>
              </div>
              <div class="product-overlay">
                <div class="product-top">
                  <div>
                    <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                    <p class="product-meta"><i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($p['dims']); ?></p>
                  </div>
                  <span class="product-price">$<?php echo number_format($p['price'], 2); ?></span>
                </div>
                <div class="product-specs">
                  <span><i class="bi bi-speedometer2"></i> <?php echo (int) $p['weight']; ?> lbs</span>
                  <span><i class="bi bi-shield"></i> 5,000 PSI</span>
                  <span><i class="bi bi-droplet"></i> <?php echo htmlspecialchars($p['drain']); ?></span>
                </div>
                <button
                  type="button"
                  class="btn-primary-solid js-open-customizer"
                  data-name="<?php echo htmlspecialchars($p['name']); ?>"
                  data-price="<?php echo (int) $p['price']; ?>"
                  data-weight="<?php echo (int) $p['weight']; ?>"
                  data-dims="<?php echo htmlspecialchars($p['dims_raw']); ?>"
                >Configure &amp; Customize</button>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="band-cta reveal mt-5">
        <h2>Don’t see your size?</h2>
        <p>We handcraft to fit your site—dimensions, quantities, and finishes on request.</p>
        <a class="btn-primary-solid" href="contact.php">Get a quote <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
