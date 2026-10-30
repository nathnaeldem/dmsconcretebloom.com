<?php
$page_title = 'Home';
$page_description = 'Concrete Bloom — handcrafted 5,000 PSI architectural concrete planters built for Dallas winds and designed to age like stone.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-wrap">
  <section class="hero-wrap">
    <div class="container">
      <div class="hero-panel reveal">
        <div class="hero-bg" style="background-image:url('assets/img/hero.jpg')"></div>
        <div class="hero-gradient"></div>
        <div class="hero-content">
          <h1>Elevate Your Outdoor Sanctuary</h1>
          <p class="lead">
            Handcrafted 5,000 PSI architectural concrete planters designed to withstand extreme Dallas winds
            while bringing natural good vibes to your spaces.
          </p>
          <form class="search-pill" action="collection.php" method="get" role="search">
            <i class="bi bi-search search-icon" aria-hidden="true"></i>
            <input type="search" name="q" id="global-search-input" placeholder="Search planters, finishes, or dimensions..." aria-label="Search collection">
            <button type="submit" class="btn-primary-solid">Search</button>
          </form>
          <div class="cta-row justify-content-center">
            <a class="btn-primary-solid" href="collection.php">Browse Collection</a>
            <a class="btn-outline-light" href="contact.php">Request Quote</a>
          </div>
        </div>
      </div>

      <div class="category-grid">
        <a class="category-card reveal" href="collection.php?cat=Urns">
          <div class="thumb">
            <img src="assets/img/cat-urns.jpg" alt="Architectural urns">
          </div>
          <h3>Architectural Urns</h3>
          <span>Tall Tree Specimens</span>
        </a>
        <a class="category-card reveal reveal-delay-1" href="collection.php?cat=Cylinders">
          <div class="thumb">
            <img src="assets/img/cat-cylinders.jpg" alt="Minimalist cylinders">
          </div>
          <h3>Minimalist Cylinders</h3>
          <span>Modern Patios &amp; Lobbies</span>
        </a>
        <a class="category-card reveal reveal-delay-2" href="collection.php?cat=Troughs">
          <div class="thumb">
            <img src="assets/img/cat-troughs.jpg" alt="Modular troughs">
          </div>
          <h3>Modular Troughs</h3>
          <span>Perimeter Privacy Walls</span>
        </a>
        <a class="category-card reveal reveal-delay-3" href="collection.php?cat=Custom">
          <div class="thumb">
            <img src="assets/img/cat-benches.jpg" alt="Custom cast benches">
          </div>
          <h3>Custom Cast Benches</h3>
          <span>Integrated Seating</span>
        </a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="hook-banner reveal">
        <div class="hook-icon" aria-hidden="true"><i class="bi bi-hurricane"></i></div>
        <div>
          <h2>Dallas winds don’t wait for cheap plastic.</h2>
          <p>
            Across Dallas–Fort Worth, strong winds and severe storm weather regularly toss, crack, and shatter
            lightweight imported plastic planters. <strong>Concrete Bloom</strong> hand-casts every piece in
            5,000 PSI concrete—heavy enough to stay anchored where you put it, season after season.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-surface" style="padding-top:0;">
    <div class="container">
      <div class="about-grid">
        <div class="about-copy reveal">
          <span class="section-kicker">Master Artisans</span>
          <h2>Engineered for Extremes. Crafted for Life.</h2>
          <p>
            Most American homes, offices, and workplaces focus so much on decorating the inside.
            The moment you step outside, your environment should feel just as welcoming, stylish, and full of life.
            We cast using a high-strength 5,000 PSI concrete matrix—built for North Texas weather.
          </p>
          <div class="stats-mini">
            <div class="stat-card dark">
              <div class="num">5,000 PSI</div>
              <div class="label">High-Strength Matrix</div>
            </div>
            <div class="stat-card light">
              <div class="num">100%</div>
              <div class="label">Handcrafted Artisan Cast</div>
            </div>
            <div class="stat-card light">
              <div class="num">10+ Yrs</div>
              <div class="label">Freeze-Thaw Weather Proof</div>
            </div>
            <div class="stat-card light">
              <div class="num">Heavy</div>
              <div class="label">High-Wind Storm Stable</div>
            </div>
          </div>
        </div>

        <div class="collage reveal reveal-delay-1">
          <div class="collage-col">
            <div class="collage-img h-sm">
              <img src="assets/img/cat-troughs.jpg" alt="Natural patina texture">
            </div>
            <div class="collage-img h-lg">
              <img src="assets/img/product-monolith-urn.jpg" alt="Concrete planter detail">
            </div>
          </div>
          <div class="collage-col offset">
            <div class="collage-img h-lg">
              <img src="assets/img/hero.jpg" alt="Exterior greenery">
            </div>
            <div class="collage-badge">
              <i class="bi bi-shield-check"></i>
              <strong>Natural Aging Patina</strong>
              <span>Acquires hand-carved stone elegance over time.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Our Craft &amp; Guarantees</span>
          <h2>Our Services</h2>
          <p>Built to withstand the harshest weather conditions while bringing natural good vibes to your outdoor architectural spaces.</p>
        </div>
      </div>
      <div class="service-grid">
        <article class="service-card dark reveal">
          <div>
            <div class="service-icon"><i class="bi bi-snow"></i></div>
            <h3>Freeze-Thaw Resistant</h3>
            <p>Engineered to prevent cracking through severe winter freezes and intense summer heat waves.</p>
          </div>
          <a class="link-arrow" href="service.php" style="color:#a5b4fc!important;">Learn More <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-1">
          <div>
            <div class="service-icon"><i class="bi bi-stars"></i></div>
            <h3>Natural Patina Evolution</h3>
            <p>Unlike plastic or composite planters that fade, our concrete develops a rich, weathered stone character.</p>
          </div>
          <a class="link-arrow" href="service.php">Learn More <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-2">
          <div>
            <div class="service-icon"><i class="bi bi-wind"></i></div>
            <h3>High-Wind Storm Stability</h3>
            <p>Heavy-duty natural weight provides absolute anchoring against Dallas storm winds and severe weather.</p>
          </div>
          <a class="link-arrow" href="about.php">Learn More <i class="bi bi-arrow-right"></i></a>
        </article>
        <article class="service-card light reveal reveal-delay-3">
          <div>
            <div class="service-icon"><i class="bi bi-truck"></i></div>
            <h3>White-Glove Freight Delivery</h3>
            <p>Specialized pallet shipping and crane offloading assistance for commercial and residential installations.</p>
          </div>
          <a class="link-arrow" href="contact.php">Learn More <i class="bi bi-arrow-right"></i></a>
        </article>
      </div>
    </div>
  </section>

  <section class="section section-surface">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Handcrafted Catalog</span>
          <h2>Discover Your Signature Planter</h2>
          <p>Find the ideal hand-cast concrete centerpiece for your home, office, or commercial architectural project.</p>
        </div>
      </div>

      <div class="product-grid" id="product-grid">
        <article class="product-card reveal">
          <div class="product-media">
            <img src="assets/img/product-monolith-urn.jpg" alt="The Monolith Urn">
            <span class="product-badge">Urns &amp; Vessels</span>
          </div>
          <div class="product-overlay">
            <div class="product-top">
              <div>
                <h3>The Monolith Urn</h3>
                <p class="product-meta"><i class="bi bi-geo-alt"></i> 36" Dia × 32" H · Residential / Patio</p>
              </div>
              <span class="product-price">$620.00</span>
            </div>
            <div class="product-specs">
              <span><i class="bi bi-speedometer2"></i> 320 lbs</span>
              <span><i class="bi bi-shield"></i> 5,000 PSI</span>
              <span><i class="bi bi-droplet"></i> Dual Drain</span>
            </div>
            <button
              type="button"
              class="btn-primary-solid js-open-customizer"
              data-name="The Monolith Urn"
              data-price="620"
              data-weight="320"
              data-dims='36" Dia x 32" H'
            >Configure &amp; Customize</button>
          </div>
        </article>

        <article class="product-card reveal reveal-delay-1">
          <div class="product-media">
            <img src="assets/img/product-brutalist-trough.jpg" alt="The Brutalist Trough">
            <span class="product-badge">Modular Troughs</span>
          </div>
          <div class="product-overlay">
            <div class="product-top">
              <div>
                <h3>The Brutalist Trough</h3>
                <p class="product-meta"><i class="bi bi-geo-alt"></i> 72"L × 24"W × 24"H · Commercial Perimeter</p>
              </div>
              <span class="product-price">$850.00</span>
            </div>
            <div class="product-specs">
              <span><i class="bi bi-speedometer2"></i> 510 lbs</span>
              <span><i class="bi bi-shield"></i> 5,000 PSI</span>
              <span><i class="bi bi-droplet"></i> Quad Drain</span>
            </div>
            <button
              type="button"
              class="btn-primary-solid js-open-customizer"
              data-name="The Brutalist Trough"
              data-price="850"
              data-weight="510"
              data-dims='72"L x 24"W x 24"H'
            >Configure &amp; Customize</button>
          </div>
        </article>

        <article class="product-card reveal reveal-delay-2">
          <div class="product-media">
            <img src="assets/img/product-zenith-cylinder.jpg" alt="The Zenith Cylinder">
            <span class="product-badge">Cylinders</span>
          </div>
          <div class="product-overlay">
            <div class="product-top">
              <div>
                <h3>The Zenith Cylinder</h3>
                <p class="product-meta"><i class="bi bi-geo-alt"></i> 30" Dia × 30" H · Minimalist Patio</p>
              </div>
              <span class="product-price">$490.00</span>
            </div>
            <div class="product-specs">
              <span><i class="bi bi-speedometer2"></i> 260 lbs</span>
              <span><i class="bi bi-shield"></i> 5,000 PSI</span>
              <span><i class="bi bi-droplet"></i> Single Drain</span>
            </div>
            <button
              type="button"
              class="btn-primary-solid js-open-customizer"
              data-name="The Zenith Cylinder"
              data-price="490"
              data-weight="260"
              data-dims='30" Dia x 30" H'
            >Configure &amp; Customize</button>
          </div>
        </article>

        <article class="product-card reveal reveal-delay-3">
          <div class="product-media">
            <img src="assets/img/product-cascade-planter.jpg" alt="The Cascade Planter">
            <span class="product-badge">Custom Cast</span>
          </div>
          <div class="product-overlay">
            <div class="product-top">
              <div>
                <h3>The Cascade Planter</h3>
                <p class="product-meta"><i class="bi bi-geo-alt"></i> 48"L × 48"W × 20"H · Plaza Centerpiece</p>
              </div>
              <span class="product-price">$780.00</span>
            </div>
            <div class="product-specs">
              <span><i class="bi bi-speedometer2"></i> 410 lbs</span>
              <span><i class="bi bi-shield"></i> 5,000 PSI</span>
              <span><i class="bi bi-droplet"></i> Dual Drain</span>
            </div>
            <button
              type="button"
              class="btn-primary-solid js-open-customizer"
              data-name="The Cascade Planter"
              data-price="780"
              data-weight="410"
              data-dims='48"L x 48"W x 20"H'
            >Configure &amp; Customize</button>
          </div>
        </article>
      </div>

      <div class="text-center mt-5 reveal">
        <a class="btn-outline-brand" href="collection.php">View Full Collection <i class="bi bi-arrow-right"></i></a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head centered reveal">
        <div>
          <span class="section-kicker">Process</span>
          <h2>How It Works</h2>
          <p>From first conversation to a finished outdoor space that people actually want to spend time in.</p>
        </div>
      </div>
      <div class="process-track">
        <div class="process-step reveal">
          <div class="process-num">01</div>
          <h3>Plan</h3>
          <p>Share your space, plant goals, and vibe—we size and finish with you.</p>
        </div>
        <div class="process-step reveal reveal-delay-1">
          <div class="process-num">02</div>
          <h3>Cast</h3>
          <p>Each piece is hand-cast in 5,000 PSI concrete and finished individually.</p>
        </div>
        <div class="process-step reveal reveal-delay-2">
          <div class="process-num">03</div>
          <h3>Cure</h3>
          <p>Controlled curing builds strength that outlasts plastic and composites.</p>
        </div>
        <div class="process-step reveal reveal-delay-3">
          <div class="process-num">04</div>
          <h3>Deliver</h3>
          <p>Heavy-duty planters arrive ready to anchor your outdoor design.</p>
        </div>
        <div class="process-step reveal">
          <div class="process-num">05</div>
          <h3>Bloom</h3>
          <p>Plant, enjoy, and watch the concrete mature into natural-stone beauty.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-surface">
    <div class="container">
      <div class="split-cta">
        <div class="cta-panel reveal">
          <h2>Ready to Build Outdoors That Last?</h2>
          <p>Custom sizes, finishes, and project-scale orders across Dallas–Fort Worth. Let’s craft your outdoor story.</p>
          <a class="btn-white" href="contact.php">Get a Free Quote <i class="bi bi-arrow-right"></i></a>
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
                  Cheap lightweight plastic pots are easily blown over, cracked, or shattered by North Texas wind
                  and storm weather. Our hand-cast concrete is heavy-duty by design—naturally stable against
                  extreme wind while protecting your plants for decades.
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
                  We cast every piece in 5,000 PSI high-strength concrete—freeze–thaw resistant, high-heat resilient,
                  and heavy enough to stay put. Unlike plastic that fades, our concrete develops a rich natural-stone patina.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                  Can you make custom sizes and finishes?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes. Every planter is hand-cast and finished individually. Share dimensions, quantity, and the look
                  you’re after—we’ll craft pieces that fit your site and style.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                  Do you serve homes and commercial projects?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely. We craft for Dallas homes, offices, and workplaces—anywhere outdoor environments should
                  feel as welcoming and stylish as the interiors.
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
