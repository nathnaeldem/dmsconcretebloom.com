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
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Nunito+Sans:ital,opsz,wght@0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;1,6..12,400&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div id="toast" class="site-toast" role="status" aria-live="polite">
    <span class="toast-dot"></span>
    <span id="toast-msg">Saved to favorites</span>
  </div>

  <header class="site-header">
    <nav class="site-nav rounded-nav">
      <div class="nav-inner">
        <a class="brand" href="index.php" aria-label="<?php echo htmlspecialchars($site_name); ?> home">
          <img class="brand-logo" src="assets/img/logo.png" alt="<?php echo htmlspecialchars($site_name); ?>">
        </a>

        <ul class="nav-links">
          <li><a class="<?php echo $current === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a></li>
          <li><a class="<?php echo $current === 'collection.php' ? 'active' : ''; ?>" href="collection.php">Shop</a></li>
          <li><a class="<?php echo $current === 'about.php' ? 'active' : ''; ?>" href="about.php">About</a></li>
          <li><a class="<?php echo $current === 'service.php' ? 'active' : ''; ?>" href="service.php">Craft</a></li>
          <li><a class="<?php echo $current === 'order.php' ? 'active' : ''; ?>" href="order.php">Order</a></li>
        </ul>

        <div class="nav-icons">
          <a class="icon-btn d-none d-sm-grid" href="collection.php" aria-label="Search collection">
            <i class="bi bi-search"></i>
          </a>
          <a class="icon-btn is-accent d-none d-sm-grid" href="order.php" aria-label="Order planters">
            <i class="bi bi-bag"></i>
          </a>
          <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navPanel">
            <i class="bi bi-list"></i>
          </button>
        </div>
      </div>
    </nav>

    <div class="nav-panel" id="navPanel" hidden>
      <div class="nav-panel-sheet">
        <button class="nav-close" type="button" aria-label="Close menu"><i class="bi bi-x-lg"></i></button>
        <ul class="nav-panel-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="collection.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="service.php">Craft</a></li>
          <li><a href="order.php">Order</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <a class="btn-coral w-100" href="order.php">Order Now <i class="bi bi-arrow-right"></i></a>
        <a class="nav-panel-phone" href="tel:<?php echo htmlspecialchars($site_phone_href); ?>"><?php echo htmlspecialchars($site_phone); ?></a>
      </div>
    </div>
  </header>
