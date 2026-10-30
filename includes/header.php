<?php
if (!isset($site_name)) {
  require_once __DIR__ . '/config.php';
}
$current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars(($page_title ?? 'Home') . ' · ' . $site_name); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_description ?? $site_tagline); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div id="toast" class="site-toast" role="status" aria-live="polite">
    <span class="toast-dot"></span>
    <span id="toast-msg">Added to project bag</span>
  </div>

  <header class="site-header">
    <nav class="site-nav rounded-nav">
      <div class="container nav-inner">
        <a class="brand" href="index.php" aria-label="<?php echo htmlspecialchars($site_name); ?> home">
          <span class="brand-mark" aria-hidden="true">
            <i class="bi bi-flower2"></i>
          </span>
          <span class="brand-name">
            <span class="brand-full"><?php echo htmlspecialchars($site_name); ?></span>
            <span class="brand-short">DMS Bloom</span>
          </span>
        </a>

        <ul class="nav-links d-none d-lg-flex">
          <li><a class="<?php echo $current === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a></li>
          <li><a class="<?php echo $current === 'about.php' ? 'active' : ''; ?>" href="about.php">About</a></li>
          <li><a class="<?php echo $current === 'service.php' ? 'active' : ''; ?>" href="service.php">Service</a></li>
          <li><a class="<?php echo $current === 'collection.php' ? 'active' : ''; ?>" href="collection.php">Collection</a></li>
          <li><a class="<?php echo $current === 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact</a></li>
        </ul>

        <div class="nav-actions d-none d-lg-flex">
          <a class="btn-nav-phone" href="tel:<?php echo htmlspecialchars($site_phone_href); ?>">
            <i class="bi bi-telephone-fill"></i>
            <span><?php echo htmlspecialchars($site_phone); ?></span>
          </a>
          <a class="btn-nav-quote" href="contact.php">Request Quote</a>
        </div>

        <button class="nav-toggle d-lg-none" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navPanel">
          <i class="bi bi-list"></i>
        </button>
      </div>
    </nav>

    <div class="nav-panel" id="navPanel" hidden>
      <button class="nav-close" type="button" aria-label="Close menu"><i class="bi bi-x-lg"></i></button>
      <ul class="nav-panel-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="service.php">Service</a></li>
        <li><a href="collection.php">Collection</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
      <a class="btn-primary-solid w-100" href="contact.php">Request Quote</a>
      <a class="nav-panel-phone" href="tel:<?php echo htmlspecialchars($site_phone_href); ?>"><?php echo htmlspecialchars($site_phone); ?></a>
    </div>
  </header>
