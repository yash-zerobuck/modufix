<?php
/**
 * Global Header
 * Include this at the top of every page:
 *   <?php
 *   $pageTitle       = "Page Title — Modufix";
 *   $metaDescription = "One or two sentences (under ~160 characters) describing this page for search results.";
 *   include 'includes/header.php';
 *   ?>
 *
 * Optional per-page variables (set BEFORE including this file):
 *   $pageTitle       -> <title> text (falls back to default below)
 *   $metaDescription -> <meta name="description"> + Open Graph/Twitter description (falls back to default below)
 *   $metaImage       -> image path used for Open Graph/Twitter previews (falls back to default below)
 *   $activeNav       -> id of nav link to highlight, e.g. "about", "services"
 */

if (!isset($pageTitle)) {
    $pageTitle = "ModuFix | Professional Installation Services in Rajkot";
}
if (!isset($metaDescription)) {
    $metaDescription = "ModuFix provides professional installation services in Rajkot, Gujarat — modular kitchens, wardrobes, flooring, electrical work, and hardware fitting. Book a free quote today.";
}
if (!isset($metaImage)) {
    $metaImage = "images/moduler-furniture.jpg";
}
if (!isset($activeNav)) {
    $activeNav = "";
}

// Helper to add an "active" class to the current nav link
function nav_active($id, $activeNav) {
    return $id === $activeNav ? ' class="active"' : '';
}

// Build an absolute URL for canonical / Open Graph tags (strips any query string)
$protocol    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host        = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'www.modufix.com';
$requestPath = isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '/';
$canonicalUrl = $protocol . '://' . $host . $requestPath;
$absoluteImage = $protocol . '://' . $host . '/' . ltrim($metaImage, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Primary SEO -->
<title><?php echo htmlspecialchars($pageTitle); ?></title>
<meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
<link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="ModuFix">
<meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
<meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
<meta property="og:image" content="<?php echo htmlspecialchars($absoluteImage); ?>">
<meta property="og:locale" content="en_IN">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
<meta name="twitter:image" content="<?php echo htmlspecialchars($absoluteImage); ?>">

<link rel="icon" type="image/png" href="images/modufix_favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link rel="stylesheet" href="css/style.css?v=4">

<?php if ($activeNav === "home"): ?>
<!-- LocalBusiness structured data (helps Google Business/Maps-style results) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "HomeAndConstructionBusiness",
  "name": "ModuFix",
  "description": <?php echo json_encode($metaDescription); ?>,
  "image": <?php echo json_encode($absoluteImage); ?>,
  "telephone": "+91-98765-43210",
  "email": "hello@modufix.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "14 Millhouse Lane",
    "addressLocality": "Rajkot",
    "addressRegion": "Gujarat",
    "postalCode": "360001",
    "addressCountry": "IN"
  },
  "openingHours": "Tu-Su 10:00-19:00",
  "url": <?php echo json_encode($canonicalUrl); ?>
}
</script>
<?php endif; ?>
</head>
<body>

<header>
  <nav class="wrap">
    <div class="brand"><a href="index.php" style="display:flex;align-items:center;gap:10px;"><img src="images/modufix_logo.png" alt="Modufix logo"></a></div>
    <ul class="navlinks">
      <li><a href="index.php"<?php echo nav_active('home', $activeNav); ?>>Home</a></li>
      <li><a href="index.php#services"<?php echo nav_active('services', $activeNav); ?>>Services</a></li>
      <li><a href="index.php#about"<?php echo nav_active('about', $activeNav); ?>>About Us</a></li>
      <li><a href="index.php#process"<?php echo nav_active('process', $activeNav); ?>>How It Works</a></li>
      <li><a href="index.php#materials"<?php echo nav_active('materials', $activeNav); ?>>Why ModuFix</a></li>
      <li><a href="index.php#contact"<?php echo nav_active('contact', $activeNav); ?>>Contact</a></li>
      <li class="mobile-cta-item"><a href="index.php#contact" class="mobile-book-btn">Book a Service →</a></li>
    </ul>
    <a href="index.php#contact" class="nav-cta">Book a Service →</a>
    <button class="menu-btn" aria-label="Menu"><span></span><span></span><span></span></button>
  </nav>
</header>
