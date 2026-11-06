<?php
$page_title = 'Shop';
$page_description = 'Shop Concrete Bloom classical cast-stone pots—available with matching pedestal bases or pot only.';
require_once __DIR__ . '/includes/products.php';
require_once __DIR__ . '/includes/header.php';

$filter = isset($_GET['cat']) ? trim($_GET['cat']) : '';
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

$filtered = array_values(array_filter($products, function ($p) use ($filter, $query) {
  if ($filter === 'With Base' && empty($p['has_base'])) {
    return false;
  }
  if ($filter === 'Pot Only') {
    // All current pieces offer pot-only; keep filter useful
  }
  if ($filter !== '' && $filter !== 'With Base' && $filter !== 'Pot Only' && strcasecmp($p['category'], $filter) !== 0) {
    return false;
  }
  if ($query !== '') {
    $hay = strtolower($p['name'] . ' ' . $p['blurb'] . ' ' . $p['diff'] . ' ' . $p['pot_dims']);
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
      <span class="section-kicker">Our Collection</span>
      <h1>Real pieces. <span class="accent">Your choice</span> of base.</h1>
      <p>
        Three classical cast-stone pots—each available with a matching pedestal or as the pot alone.
        Built heavy for Dallas outdoors.
      </p>
      <?php if ($filter !== '' || $query !== ''): ?>
        <p class="mt-3" style="color:var(--coral);font-weight:600;font-size:0.85rem;">
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
        $cats = ['' => 'All', 'Pots' => 'Pots', 'With Base' => 'With Base', 'Pot Only' => 'Pot Only'];
        foreach ($cats as $key => $label):
          $active = ($filter === $key) || ($key === '' && $filter === '');
        ?>
          <a
            class="<?php echo $active ? 'btn-primary-solid' : 'btn-outline-brand'; ?>"
            href="collection.php<?php echo $key !== '' ? '?cat=' . urlencode($key) : ''; ?>"
            style="padding:0.55rem 1.1rem;font-size:0.8rem;"
          ><?php echo htmlspecialchars($label); ?></a>
        <?php endforeach; ?>
      </div>

      <?php if (count($filtered) === 0): ?>
        <div class="aging-box reveal text-center">
          <h3>No pieces matched</h3>
          <p>Try another filter or <a href="collection.php" style="color:var(--coral);font-weight:600;">view the full collection</a>.</p>
        </div>
      <?php else: ?>
        <div class="catalog-grid">
          <?php foreach ($filtered as $i => $p): ?>
            <article class="catalog-card reveal<?php echo $i ? ' reveal-delay-' . min($i, 3) : ''; ?>" id="<?php echo htmlspecialchars($p['id']); ?>">
              <div class="catalog-media">
                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
              </div>
              <div class="catalog-body">
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p class="catalog-blurb"><?php echo htmlspecialchars($p['blurb']); ?></p>

                <div class="catalog-specs">
                  <div>
                    <span class="label">Pot dimensions</span>
                    <strong><?php echo htmlspecialchars($p['pot_dims']); ?></strong>
                  </div>
                  <?php if (!empty($p['has_base'])): ?>
                    <div>
                      <span class="label">Base dimensions</span>
                      <strong><?php echo htmlspecialchars($p['base_dims']); ?></strong>
                    </div>
                  <?php endif; ?>
                </div>
                <p class="catalog-diff">Available with pedestal base or pot only (no base).</p>

                <div class="catalog-variants">
                  <?php foreach ($p['variants'] as $v): ?>
                    <a class="btn-coral" href="order.php?piece=<?php echo urlencode($v['name']); ?>">
                      Order Now · <?php echo htmlspecialchars($v['label']); ?>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <div class="band-cta reveal mt-5">
        <h2>Need a custom size?</h2>
        <p>Tell us the look and dimensions—we’ll help match a piece to your space.</p>
        <a class="btn-coral" href="order.php">Start an order <i class="bi bi-arrow-up-right"></i></a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
