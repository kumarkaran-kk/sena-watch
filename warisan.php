<?php
require_once __DIR__ . '/app/bootstrap.php';
$pageTitle = 'Warisan Collection — SENA Watches';
$pageDescription = 'Explore the SENA Warisan quartz collection: three-hand date, chronograph and multi-function watches in burgundy, blue and green.';
$activePage = 'collections';
require __DIR__ . '/app/partials/header.php';
?>
<main id="main" class="inner-page">
    <section class="inner-hero collection-hero"><div><p class="eyebrow">SENA / THE COLLECTION</p><h1>Warisan.<br>A legacy to wear.</h1><p>Engineered for daily life, crafted for generations. Discover purposeful quartz timepieces, assembled in Malaysia and made to move with you.</p><a class="solid-button" href="#timepieces">Explore timepieces ↓</a></div><img src="assets/optimized/watch-trio.webp" alt="SENA watches in burgundy, green and blue" width="800" height="800"></section>
    <div class="quality-strip"><span>316L stainless steel</span><span>AR-coated sapphire crystal</span><span>Japanese Miyota quartz</span><span>2-year international warranty</span></div>
    <section class="inner-section" id="timepieces"><div class="section-heading"><div><p class="eyebrow">EVERYDAY UTILITY. INDIVIDUAL CHARACTER.</p><h2>Find your Warisan.</h2></div><p>Four models. Three colours.<br>One spirit of intentional craftsmanship.</p></div>
    <div class="catalog-filters" role="group" aria-label="Filter watches"><button class="filter-button" data-filter="all" aria-pressed="true">All watches</button><button class="filter-button" data-filter="date-gents" aria-pressed="false">3-Hands · Gents</button><button class="filter-button" data-filter="date-ladies" aria-pressed="false">3-Hands · Ladies</button><button class="filter-button" data-filter="chronograph" aria-pressed="false">Chronograph</button><button class="filter-button" data-filter="multifunction" aria-pressed="false">Multi-Function</button></div>
    <p class="catalog-count" role="status">12 timepieces</p><div class="catalog-grid"><?php foreach ($senaProducts as $product) senaProductCard($product); ?></div></section>
    <section class="inner-banner"><p class="eyebrow">BUILT WITHOUT COMPROMISE</p><h2>Every detail has a purpose.</h2><p>Compare movements, dimensions and materials across the Warisan collection.</p><a class="outline-button" href="specifications.php">Explore specifications ↗</a></section>
</main>
<?php require __DIR__ . '/app/partials/footer.php'; ?>
