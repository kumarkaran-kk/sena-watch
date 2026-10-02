<?php
require_once __DIR__ . '/app/bootstrap.php';
$pageTitle = 'Warisan Collection — SENA Watches';
$pageDescription = 'Explore the SENA Warisan quartz collection: three-hand date and chronograph watches in burgundy, blue and green.';
$activePage = 'collections';
require __DIR__ . '/app/partials/header.php';
?>
<main id="main" class="inner-page">
    <section class="inner-hero collection-hero"><div><p class="eyebrow">SENA / THE COLLECTION</p><h1>Warisan.<br>A legacy to wear.</h1><p>Engineered for daily life, crafted for generations. Discover purposeful quartz timepieces, assembled in Malaysia and made to move with you.</p><a class="solid-button" href="#timepieces">Explore timepieces ↓</a></div><img src="assets/optimized/watch-trio.webp" alt="SENA watches in burgundy, green and blue" width="800" height="800"></section>
    <div class="quality-strip"><span>316L stainless steel</span><span>AR-coated sapphire crystal</span><span>Japanese Miyota quartz</span><span>2-year international warranty</span></div>
    <section class="inner-section" id="timepieces"><div class="section-heading"><div><p class="eyebrow">EVERYDAY UTILITY. INDIVIDUAL CHARACTER.</p><h2>Find your Warisan.</h2></div><p>Two models. Three colours.<br>One spirit of intentional craftsmanship.</p></div>
    <div class="catalog-filters" role="group" aria-label="Filter watches"><button class="filter-button" data-filter="all" aria-pressed="true">All watches</button><button class="filter-button" data-filter="date-gents" aria-pressed="false">3-Hands · Gents</button><button class="filter-button" data-filter="chronograph" aria-pressed="false">Chronograph</button></div>
    <p class="catalog-count" role="status"><?= count($senaProducts) ?> timepieces</p><div class="catalog-grid"><?php foreach ($senaProducts as $product) senaProductCard($product); ?></div></section>
    <section class="inner-banner" aria-labelledby="banner-title">
<svg class="banner-dial" viewBox="0 0 400 400" fill="none" aria-hidden="true" focusable="false"><circle cx="200" cy="200" r="192"/><circle cx="200" cy="200" r="171"/><circle class="banner-dial-ticks" cx="200" cy="200" r="182"/><path d="M200 91V200L276 244"/><circle cx="200" cy="200" r="7"/></svg>
<div class="banner-heading"><p class="eyebrow">BUILT WITHOUT COMPROMISE</p><h2 id="banner-title">Every detail.<em>A purpose.</em></h2></div>
<div class="banner-action"><p>Discover the materials, precision and craftsmanship behind every Warisan timepiece.</p><a class="banner-button" href="specifications.php"><span>Explore specifications</span><span class="banner-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M5 19 19 5M5 5h14v14"/></svg></span></a></div>
<div class="banner-signature" aria-hidden="true"><span>SENA <i>1941</i></span><span>THE WARISAN COLLECTION</span></div>
</section>
</main>
<?php require __DIR__ . '/app/partials/footer.php'; ?>
