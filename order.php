<?php
$page_title = 'Order';
$page_description = 'Order handcrafted DMS Concrete Bloom pots. Call us or send your name, email, and phone—we’ll follow up fast.';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/products.php';
require_once __DIR__ . '/includes/mailer.php';

$sent = false;
$error = '';
$piece = isset($_GET['piece']) ? trim($_GET['piece']) : '';
$selected = find_product_by_piece($products, $piece);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $message = trim($_POST['message'] ?? '');
  $interest = trim($_POST['piece'] ?? '');
  $selected = find_product_by_piece($products, $interest) ?: $selected;

  if ($name === '' || $email === '' || $phone === '') {
    $error = 'Please fill in your name, email, and phone number.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } else {
    $sku = $selected['sku'] ?? '';
    $productLabel = $interest !== '' ? $interest : 'General order inquiry';
    if ($selected) {
      $productLabel = $selected['sku'] . ' ' . $selected['name'];
    }

    $log_dir = __DIR__ . '/storage';
    if (!is_dir($log_dir)) {
      @mkdir($log_dir, 0755, true);
    }
    $entry = [
      'type' => 'order',
      'time' => date('c'),
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'piece' => $productLabel,
      'sku' => $sku,
      'message' => $message,
    ];
    @file_put_contents(
      $log_dir . '/inquiries.log',
      json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
      FILE_APPEND | LOCK_EX
    );

    $rows = [
      'Reference' => $sku !== '' ? $sku : 'N/A',
      'Product' => $productLabel,
      'Price' => isset($selected['price']) ? product_price_label((int) $selected['price']) : 'Quote',
      'Dimensions' => $selected['dims'] ?? '',
      'Customer name' => $name,
      'Email' => $email,
      'Phone' => $phone,
      'Message' => $message !== '' ? $message : '(none)',
      'Submitted' => date('M j, Y g:i A T'),
    ];

    $html = bloom_build_email_html(
      'New order request',
      $rows,
      'Reply directly to this email to reach the customer.'
    );

    $to = $site_orders_email ?? $site_email;
    $subject = 'New Order' . ($sku !== '' ? " {$sku}" : '') . " — {$name}";
    $mailed = bloom_send_mail($to, $subject, $html, $email);

    if (!$mailed) {
      $error = 'We saved your request, but email delivery failed. Please call us or try again.';
    } else {
      $sent = true;
      $piece = '';
      $selected = null;
    }
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="page-wrap">
  <header class="page-hero">
    <div class="container reveal">
      <span class="section-kicker">Easy Ordering</span>
      <h1>Place your <span class="accent">order</span>.</h1>
      <p>
        Call us or send a quick form—name, email, and phone is all we need to get started.
        Mention product codes <strong>#001</strong>, <strong>#002</strong>, or <strong>#003</strong> when you call.
      </p>
    </div>
  </header>

  <section class="section" style="padding-top:0.5rem;">
    <div class="container order-grid">
      <aside class="order-aside reveal">
        <div class="order-contact-cards">
          <a class="order-contact-card" href="tel:<?php echo htmlspecialchars($site_phone_href); ?>">
            <span class="order-contact-icon"><i class="bi bi-telephone-fill"></i></span>
            <div>
              <span class="label">Phone</span>
              <strong><?php echo htmlspecialchars($site_phone); ?></strong>
            </div>
          </a>
          <a class="order-contact-card" href="mailto:<?php echo htmlspecialchars($site_email); ?>">
            <span class="order-contact-icon"><i class="bi bi-envelope-fill"></i></span>
            <div>
              <span class="label">Email</span>
              <strong><?php echo htmlspecialchars($site_email); ?></strong>
            </div>
          </a>
          <div class="order-contact-card static">
            <span class="order-contact-icon"><i class="bi bi-geo-alt-fill"></i></span>
            <div>
              <span class="label">Service Area</span>
              <strong><?php echo htmlspecialchars($site_address); ?></strong>
            </div>
          </div>
        </div>
      </aside>

      <div class="contact-form-card order-form-card reveal reveal-delay-1">
        <?php if ($sent): ?>
          <div class="alert-ok" role="status">Thanks—your order request is in. We’ll call or email you soon.</div>
          <div class="cta-row">
            <a class="btn-coral" href="collection.php">Browse collection</a>
            <a class="btn-outline-brand" href="index.php">Home</a>
          </div>
        <?php else: ?>
          <?php if ($error !== ''): ?>
            <div class="alert-err" role="alert"><?php echo htmlspecialchars($error); ?></div>
          <?php endif; ?>
          <h2 class="order-form-title">Order form</h2>
          <?php if ($selected): ?>
            <p class="order-selected">
              Ordering: <span class="sku-inline"><?php echo htmlspecialchars($selected['sku']); ?></span>
              <strong><?php echo htmlspecialchars($selected['name']); ?></strong>
              · <?php echo product_price_label((int) $selected['price']); ?>
            </p>
          <?php elseif ($piece !== ''): ?>
            <p class="order-selected">Ordering: <strong><?php echo htmlspecialchars($piece); ?></strong></p>
          <?php endif; ?>
          <form class="contact-form" method="post" action="order.php<?php echo $piece !== '' ? '?piece=' . urlencode($piece) : ''; ?>" novalidate>
            <div class="form-field">
              <label for="piece_select">Product</label>
              <select id="piece_select" name="piece">
                <option value="">Select a product (optional)</option>
                <?php
                $currentPiece = $_POST['piece'] ?? ($selected['name'] ?? $piece);
                foreach ($products as $p):
                  $val = $p['name'];
                  $label = $p['sku'] . ' — ' . $p['name'] . ' · ' . product_price_label((int) $p['price']);
                ?>
                  <option value="<?php echo htmlspecialchars($val); ?>" <?php echo $currentPiece === $val ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($label); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-field">
              <label for="name">Name <span class="req">*</span></label>
              <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" placeholder="Your full name">
            </div>
            <div class="form-field">
              <label for="email">Email <span class="req">*</span></label>
              <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" placeholder="you@email.com">
            </div>
            <div class="form-field">
              <label for="phone">Phone number <span class="req">*</span></label>
              <input type="tel" id="phone" name="phone" required value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>" placeholder="(555) 000-0000">
            </div>
            <div class="form-field">
              <label for="message">Message <span class="optional">(optional)</span></label>
              <textarea id="message" name="message" placeholder="Quantity, delivery notes, questions…"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            </div>
            <button type="submit" class="btn-coral w-100">Submit Order <i class="bi bi-arrow-up-right"></i></button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
