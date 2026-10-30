<?php if (!isset($site_name)) { require_once __DIR__ . '/config.php'; } ?>
  <footer class="site-footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <a class="brand" href="index.php">
            <span class="brand-mark" aria-hidden="true"><i class="bi bi-flower2"></i></span>
            <span class="brand-name"><?php echo htmlspecialchars($site_name); ?> Studio</span>
          </a>
          <p class="footer-tagline"><?php echo htmlspecialchars($site_tagline); ?></p>
        </div>
        <ul class="footer-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="service.php">Service</a></li>
          <li><a href="collection.php">Collection</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <p class="footer-copy">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($site_name); ?>. Handcrafted in <?php echo htmlspecialchars($site_service_area); ?>.</p>
      </div>
    </div>
  </footer>

  <!-- Configure Modal -->
  <div class="modal fade" id="customizerModal" tabindex="-1" aria-labelledby="customizerTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content customizer-sheet">
        <button type="button" class="customizer-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </button>
        <span class="section-kicker">Interactive Studio</span>
        <h2 id="customizerTitle" class="customizer-title">Configure Planter</h2>
        <p id="customizerDims" class="customizer-dims"></p>

        <div class="customizer-block">
          <label class="customizer-label">Select Concrete Matrix Finish</label>
          <div class="finish-grid">
            <button type="button" class="finish-btn active" data-finish="Raw Industrial Grey" data-addon="0">Raw Grey</button>
            <button type="button" class="finish-btn" data-finish="Volcanic Charcoal" data-addon="20">Charcoal</button>
            <button type="button" class="finish-btn" data-finish="Sandstone Buff" data-addon="40">Sandstone</button>
          </div>
        </div>

        <div class="customizer-block">
          <label class="customizer-label" for="modalDrainage">Drainage Specification</label>
          <select id="modalDrainage" class="form-select customizer-select">
            <option>Dual Bottom Core Drainage Holes (Outdoor Standard)</option>
            <option>Sealed Waterproof Interior Liner (Indoor Office)</option>
            <option>Threaded PVC Irrigation Sleeve</option>
          </select>
        </div>

        <div class="customizer-meta">
          <div class="d-flex justify-content-between">
            <span>Estimated Dry Deadweight</span>
            <strong id="modalWeight">320 lbs</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Wind Load Anchoring</span>
            <strong class="text-success">110+ MPH Stable</strong>
          </div>
        </div>

        <div class="customizer-footer">
          <div>
            <span class="customizer-invest-label">Total Investment</span>
            <div id="modalPrice" class="customizer-price">$620.00</div>
          </div>
          <button type="button" class="btn-primary-solid" id="addToBagBtn">Add To Project Bag</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
