<?php
require_once dirname(__DIR__) . '/bootstrap.php';
$activePage = $activePage ?? (!empty($isHomePage) ? 'home' : '');
$pageTitle = $pageTitle ?? 'SENA Watches — Elegance Meets Precision';
$pageDescription = $pageDescription ?? 'Discover SENA watches. Classic watchmaking, modern utility, and timeless design. Explore the Warisan quartz collection.';
$isHomePage = $isHomePage ?? false;
$homeLink = $isHomePage ? '' : 'index.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#280510">
    <meta name="description"
        content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
<?php if ($isHomePage): ?>
    <link rel="preload" href="assets/optimized/hero.webp" as="image" fetchpriority="high">
<?php endif; ?>
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?= filemtime(dirname(__DIR__, 2) . '/assets/css/style.css') ?>">
    <link rel="stylesheet" href="assets/css/inner.css">
<?php if (!empty($isProductPage)): ?>
    <link rel="stylesheet" href="assets/css/product.css">
    <script src="assets/js/product.js" defer></script>
<?php endif; ?>
    <script id="sena-catalog" type="application/json"><?= json_encode($senaProducts, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
    <script id="sena-config" type="application/json"><?= json_encode($senaConfig, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?></script>
    <script src="assets/js/main.js?v=<?= filemtime(dirname(__DIR__, 2) . '/assets/js/main.js') ?>" defer></script>
</head>

<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <div class="site-shell" id="home">
        <header class="site-header">
            <a class="brand" href="index.php" aria-label="SENA Watches home"><img src="assets/optimized/logo.webp"
                    alt="SENA 1941" width="145" height="78"></a>
            <nav class="header-left" aria-label="Main navigation">
                <a class="nav-pill" href="index.php" <?= $activePage === 'home' ? 'aria-current="page"' : '' ?>>Home</a>
                <div class="collection-menu"><button class="nav-pill collection-toggle" aria-expanded="false"
                        aria-controls="collection-links">Collections <span class="menu-chevron" aria-hidden="true"></span></button>
                    <div class="collection-links" id="collection-links" hidden><a
                            href="warisan.php">Warisan</a></div>
                </div>
                <a class="nav-pill" href="heritage.php" <?= $activePage === 'heritage' ? 'aria-current="page"' : '' ?>>Our Heritage</a>
                <a class="nav-pill" href="specifications.php" <?= $activePage === 'specifications' ? 'aria-current="page"' : '' ?>>Specifications</a>
                <a class="nav-pill" href="contact.php" <?= $activePage === 'contact' ? 'aria-current="page"' : '' ?>>Contact Us</a>
            </nav>
            <div class="header-right">
                <button class="icon-button search-button" data-open="search" aria-label="Search watches"><img
                        src="assets/images/vector4.svg" alt="" width="21" height="21"></button>
                <button class="account-button" data-open="account" aria-label="Your account"><img
                        src="assets/images/property1-default2.svg" alt="" width="40" height="40"></button>
                <button class="mobile-menu-button" aria-label="Open menu" aria-expanded="false"
                    aria-controls="mobile-navigation"><span></span><span></span></button>
            </div>
            <nav id="mobile-navigation" class="mobile-navigation" aria-label="Mobile navigation" hidden>
                <a href="index.php" <?= $activePage === 'home' ? 'aria-current="page"' : '' ?>>Home</a>
                <details class="mobile-collection">
                    <summary>Collections <span class="menu-chevron" aria-hidden="true"></span></summary>
                    <a class="mobile-sub-link" href="warisan.php">Warisan</a>
                </details>
                <a href="heritage.php" <?= $activePage === 'heritage' ? 'aria-current="page"' : '' ?>>Our Heritage</a>
                <a href="specifications.php" <?= $activePage === 'specifications' ? 'aria-current="page"' : '' ?>>Specifications</a>
                <a href="contact.php" <?= $activePage === 'contact' ? 'aria-current="page"' : '' ?>>Contact Us</a>
            </nav>
        </header>
