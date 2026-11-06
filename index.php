<?php
$page_title = 'Home';
$page_description = 'Concrete Bloom — handcrafted architectural concrete planters that age like stone, unlike cheap plastic that tips and fades.';
require_once __DIR__ . '/includes/products.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-wrap">
  <section class="hero-banner">
    <div class="container hero-banner-grid">
      <div class="hero-banner-copy reveal">
        <span class="hero-pill">Handcrafted Concrete Bloom</span>
        <h1>Where concrete becomes <span>art</span></h1>
        <p class="hero-banner-lead">
          Our planters age like stone—heavy, beautiful, and built to outlast cheap plastic that tips, cracks, and fades in Dallas weather.
        </p>

        <ul class="hero-trust">
          <li>
            <span class="hero-trust-icon" aria-hidden="true"><i class="bi bi-bricks"></i></span>
            <span>Ages Like Natural Stone</span>
          </li>
          <li>
            <span class="hero-trust-icon" aria-hidden="true"><i class="bi bi-wind"></i></span>
            <span>Stays Put in Strong Winds</span>
          </li>
          <li>
            <span class="hero-trust-icon" aria-hidden="true"><i class="bi bi-recycle"></i></span>
            <span>Not Cheap Throwaway Plastic</span>
          </li>
        </ul>

        <a class="btn-hero-cta" href="order.php">
          Order Now
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <div class="hero-stage reveal reveal-delay-1" aria-hidden="true">
        <div class="hero-ring hero-ring-lg"></div>
        <div class="hero-ring hero-ring-sm"></div>

        <div class="hero-podium is-left">
          <img src="assets/img/hero-product-2.jpg" alt="Petal Garden Pot">
        </div>
        <div class="hero-podium is-center">
          <img src="assets/img/hero-product-1.jpg" alt="Heritage Ribbed Pot">
        </div>
        <div class="hero-podium is-right">
          <img src="assets/img/hero-product-3.jpg" alt="Grand Scalloped Pot">
        </div>
      </div>
    </div>
  </section>

  <section class="value-bar">
    <div class="container">
      <div class="value-card reveal">
        <div class="value-item">
          <div class="value-icon" aria-hidden="true"><i class="bi bi-bricks"></i></div>
          <div>
            <strong>Ages Like Stone</strong>
            <span>Richer patina every season</span>
          </div>
        </div>
        <div class="value-item">
          <div class="value-icon" aria-hidden="true"><i class="bi bi-wind"></i></div>
          <div>
            <strong>Wind-Stable Weight</strong>
            <span>Unlike tipping plastic pots</span>
          </div>
        </div>
        <div class="value-item">
          <div class="value-icon" aria-hidden="true"><i class="bi bi-house-heart"></i></div>
          <div>
            <strong>Castle-Ready Look</strong>
            <span>Classical outdoor presence</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-title-rule reveal">
        <h2>Popular Planters</h2>
      </div>

      <div class="shop-grid shop-grid-3">
        <?php foreach ($products as $i => $p): ?>
          <article class="shop-card reveal<?php echo $i ? ' reveal-delay-' . min($i, 3) : ''; ?>">
            <div class="shop-card-media">
              <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
            </div>
            <div class="shop-card-body">
              <h3><?php echo htmlspecialchars($p['short']); ?></h3>
              <div class="shop-price"><?php echo product_price_label((int) $p['price']); ?></div>
              <p class="shop-meta"><?php echo htmlspecialchars($p['dims']); ?></p>
              <a class="btn-coral shop-order-btn" href="order.php?piece=<?php echo urlencode($p['name']); ?>">
                Order Now
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>

      <div class="shop-cta-wrap reveal">
        <a class="btn-moss" href="collection.php">
          View All Products
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <?php
  $gallery_dir = __DIR__ . '/our_gallery';
  $gallery_web = 'our_gallery';
  $gallery_files = [];
  if (is_dir($gallery_dir)) {
    foreach (scandir($gallery_dir) as $file) {
      if ($file === '.' || $file === '..') continue;
      $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
      if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true)) continue;
      $gallery_files[] = $file;
    }
    natcasesort($gallery_files);
    $gallery_files = array_values($gallery_files);
  }
  ?>
  <?php if (count($gallery_files) > 0): ?>
  <section class="section section-surface" id="recent-work">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Our Gallery</span>
          <h2>Our recent work</h2>
          <p>A look at Concrete Bloom pieces installed in real Dallas–Fort Worth outdoor spaces.</p>
        </div>
      </div>
      <div class="gallery-grid">
        <?php foreach ($gallery_files as $i => $file): ?>
          <figure class="gallery-item reveal<?php echo $i ? ' reveal-delay-' . min($i % 4, 3) : ''; ?>">
            <img
              src="<?php echo htmlspecialchars($gallery_web . '/' . rawurlencode($file)); ?>"
              alt="Recent Concrete Bloom work"
              loading="lazy"
            >
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="section" style="padding-top:0;">
    <div class="container">
      <div class="promo-banner reveal">
        <div class="promo-copy">
          <h2>Turn the yard into a castle court</h2>
          <p>
            Classical concrete pots that stay anchored when plastic blows away—and grow a richer stone patina every season.
          </p>
        </div>
        <div class="promo-tiles">
          <?php foreach ($products as $p): ?>
            <article class="promo-tile">
              <div class="promo-tile-media">
                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
              </div>
              <div class="promo-tile-info">
                <strong><?php echo htmlspecialchars($p['short']); ?></strong>
                <span><?php echo product_price_label((int) $p['price']); ?> · <?php echo htmlspecialchars($p['dims']); ?></span>
                <a class="btn-coral" href="order.php?piece=<?php echo urlencode($p['name']); ?>">Order Now</a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="testimonials">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Testimonials</span>
          <h2>What our customers say</h2>
          <p>Neighbors, homeowners, and local businesses who chose Concrete Bloom over cheap plastic.</p>
        </div>
      </div>
      <div class="testimonial-grid">
        <article class="testimonial-card reveal">
          <div class="testimonial-stars" aria-hidden="true">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            “Our old plastic pots blew over every storm. The Concrete Bloom pots stay put—and the yard finally looks like something special.”
          </p>
          <footer>
            <strong>Maria R.</strong>
            <span>Homeowner · Plano, TX</span>
          </footer>
        </article>
        <article class="testimonial-card reveal reveal-delay-1">
          <div class="testimonial-stars" aria-hidden="true">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            “We ordered the scalloped pot with the base for our entry. Guests think it’s carved stone. It ages beautifully.”
          </p>
          <footer>
            <strong>James &amp; Leah T.</strong>
            <span>Residential · Dallas, TX</span>
          </footer>
        </article>
        <article class="testimonial-card reveal reveal-delay-2">
          <div class="testimonial-stars" aria-hidden="true">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            “Solid weight, classic look, easy ordering. These pieces make our patio feel like a courtyard—not a temporary setup.”
          </p>
          <footer>
            <strong>Derek K.</strong>
            <span>Small business · Frisco, TX</span>
          </footer>
        </article>
      </div>
    </div>
  </section>

  <section class="section section-surface">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Why Concrete Bloom</span>
          <h2>Straightforward. Storm-ready. Beautiful.</h2>
          <p>Three reasons Dallas homes and businesses choose hand-cast concrete over cheap plastic.</p>
        </div>
      </div>
      <div class="service-grid">
        <article class="service-card dark reveal">
          <div>
            <div class="service-icon"><i class="bi bi-wind"></i></div>
            <h3>Wind Stable</h3>
            <p>Natural weight anchors planters through Dallas gusts and storm weather.</p>
          </div>
          <a class="link-arrow" href="about.php" style="color:#fff!important;">Learn more <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-1">
          <div>
            <div class="service-icon"><i class="bi bi-bricks"></i></div>
            <h3>5,000 PSI</h3>
            <p>High-strength matrix built for freeze–thaw cycles and Texas heat.</p>
          </div>
          <a class="link-arrow" href="service.php">Learn more <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-2">
          <div>
            <div class="service-icon"><i class="bi bi-flower1"></i></div>
            <h3>Ages Like Stone</h3>
            <p>Develops a rich weathered patina instead of fading like plastic.</p>
          </div>
          <a class="link-arrow" href="service.php">Learn more <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-3">
          <div>
            <div class="service-icon"><i class="bi bi-hand-index"></i></div>
            <h3>Handcrafted</h3>
            <p>Every piece is cast and finished individually—no factory-flat feel.</p>
          </div>
          <a class="link-arrow" href="order.php">Order now <i class="bi bi-arrow-right"></i></a>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="split-cta">
        <div class="cta-panel reveal">
          <h2>Ready to bloom outdoors?</h2>
          <p>Custom sizes, finishes, and project-scale orders across Dallas–Fort Worth.</p>
          <a class="btn-coral" href="order.php">Order Now <i class="bi bi-arrow-up-right"></i></a>
        </div>
        <div class="faq-panel reveal reveal-delay-1">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                  Why do plastic planters fail in Dallas?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Lightweight plastic pots tip, crack, and shatter in North Texas wind.
                  Our hand-cast concrete is heavy on purpose—stable for decades.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                  What makes your planters different?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  5,000 PSI high-strength concrete, freeze–thaw resistance, and a surface that
                  matures into natural-stone character instead of fading.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                  Can you make custom sizes?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes. Share dimensions, quantity, and finish—we hand-cast pieces that fit your site.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
