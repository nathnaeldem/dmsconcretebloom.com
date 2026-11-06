<?php
$page_title = 'Contact';
$page_description = 'Request a custom Concrete Bloom planter or ask about materials, sizing, and project timelines across Dallas–Fort Worth.';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/products.php';

$sent = false;
$error = '';
$piece = isset($_GET['piece']) ? trim($_GET['piece']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $interest = trim($_POST['interest'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if ($name === '' || $email === '' || $message === '') {
    $error = 'Please fill in your name, email, and message.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Please enter a valid email address.';
  } else {
    $log_dir = __DIR__ . '/storage';
    if (!is_dir($log_dir)) {
      @mkdir($log_dir, 0755, true);
    }
    $entry = [
      'time' => date('c'),
      'name' => $name,
      'email' => $email,
      'interest' => $interest,
      'message' => $message,
    ];
    @file_put_contents(
      $log_dir . '/inquiries.log',
      json_encode($entry, JSON_UNESCAPED_UNICODE) . PHP_EOL,
      FILE_APPEND | LOCK_EX
    );
    $sent = true;
    $piece = '';
  }
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="page-wrap">
  <header class="page-hero">
    <div class="container reveal">
      <span class="section-kicker">Get a Quote</span>
      <h1>Let’s craft your outdoor <span class="accent">story</span>.</h1>
      <p>
        Tell us about the space, the plants, and the vibe you’re after—we’ll help with sizing,
        finish, and freight across <?php echo htmlspecialchars($site_service_area); ?>.
      </p>
    </div>
  </header>

  <section class="section" style="padding-top:0.5rem;">
    <div class="container contact-grid">
      <aside class="contact-aside reveal">
        <h2>Start a conversation</h2>
        <p>
          Residential courtyards, office terraces, or commercial entrances—every project gets
          the same handcrafted care. Built heavy for Dallas winds. Finished to age like stone.
        </p>
        <div class="contact-meta">
          <div>
            <span>Email</span>
            <a href="mailto:<?php echo htmlspecialchars($site_email); ?>"><?php echo htmlspecialchars($site_email); ?></a>
          </div>
          <div>
            <span>Phone</span>
            <a href="tel:<?php echo htmlspecialchars($site_phone_href); ?>"><?php echo htmlspecialchars($site_phone); ?></a>
          </div>
          <div>
            <span>Service Area</span>
            <strong style="color:var(--slate-900);"><?php echo htmlspecialchars($site_address); ?></strong>
          </div>
        </div>
      </aside>

      <div class="contact-form-card reveal reveal-delay-1">
        <?php if ($sent): ?>
          <div class="alert-ok" role="status">Thanks—your message is in. We’ll get back to you soon.</div>
          <div class="cta-row">
            <a class="btn-coral" href="collection.php">Back to collection</a>
            <a class="btn-outline-brand" href="index.php">Home</a>
          </div>
        <?php else: ?>
          <?php if ($error !== ''): ?>
            <div class="alert-err" role="alert"><?php echo htmlspecialchars($error); ?></div>
          <?php endif; ?>
          <form class="contact-form" method="post" action="contact.php" novalidate>
            <div class="form-row">
              <div class="form-field">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
              </div>
              <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
              </div>
            </div>
            <div class="form-field">
              <label for="interest">Interested in</label>
              <select id="interest" name="interest">
                <?php
                $options = product_order_options($products);
                $selected = $_POST['interest'] ?? ($piece !== '' ? $piece : 'General inquiry');
                foreach ($options as $opt):
                ?>
                  <option value="<?php echo htmlspecialchars($opt); ?>" <?php echo $selected === $opt ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($opt); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-field">
              <label for="message">Project details</label>
              <textarea id="message" name="message" required placeholder="Space type, approximate size, finish preferences, timeline…"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            </div>
            <button type="submit" class="btn-coral">Send message <i class="bi bi-arrow-right"></i></button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
