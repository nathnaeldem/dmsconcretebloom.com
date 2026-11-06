<?php
$page_title = 'Shop';
$page_description = 'Shop Concrete Bloom classical concrete art pots—Heritage Ribbed, Petal Garden, and Grand Scalloped.';
require_once __DIR__ . '/includes/products.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-wrap">
  <header class="page-hero">
    <div class="container reveal">
      <span class="section-kicker">Our Collection</span>
      <h1>Three pieces. <span class="accent">Ready to order</span>.</h1>
      <p>
        Classical concrete art pots, sold as shown—built heavy for Dallas outdoors.
      </p>
    </div>
  </header>

  <section class="section" style="padding-top:0.5rem;">
    <div class="container">
      <div class="catalog-grid">
        <?php foreach ($products as $i => $p): ?>
          <article class="catalog-card reveal<?php echo $i ? ' reveal-delay-' . min($i, 3) : ''; ?>" id="<?php echo htmlspecialchars($p['id']); ?>">
            <div class="catalog-media">
              <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
            </div>
            <div class="catalog-body">
              <h3><?php echo htmlspecialchars($p['name']); ?></h3>
              <div class="shop-price"><?php echo product_price_label((int) $p['price']); ?></div>
              <p class="catalog-blurb"><?php echo htmlspecialchars($p['blurb']); ?></p>

              <div class="catalog-specs">
                <div>
                  <span class="label">Dimensions</span>
                  <strong><?php echo htmlspecialchars($p['dims']); ?></strong>
                </div>
              </div>

              <div class="catalog-variants">
                <a class="btn-coral" href="order.php?piece=<?php echo urlencode($p['name']); ?>">
                  Order Now
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="band-cta reveal mt-5">
        <h2>Need a custom size?</h2>
        <p>Tell us the look and dimensions—we’ll help match a piece to your space.</p>
        <a class="btn-coral" href="order.php">Start an order <i class="bi bi-arrow-up-right"></i></a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
