<?php
require_once __DIR__ . '/app/bootstrap.php';
$id = is_string($_GET['product'] ?? null) ? $_GET['product'] : '';
$product = $senaProducts[$id] ?? null;
$activePage = 'collections';
if ($product && !empty($product['comingSoon'])) {
    header('Location: warisan.php#timepieces', true, 302);
    exit;
}
if (!$product) {
    http_response_code(404);
    $pageTitle = 'Timepiece not found — SENA Watches';
    require __DIR__ . '/app/partials/header.php'; ?>
    <main id="main" class="inner-page">
        <section class="inner-section empty-state">
            <p class="eyebrow">404 / TIMEPIECE NOT FOUND</p>
            <h1>Find your next SENA.</h1>
            <p>This timepiece could not be found. Explore the Warisan collection to discover the current models.</p><a class="solid-button" href="warisan.php">Explore Warisan</a>
        </section>
    </main>
<?php require __DIR__ . '/app/partials/footer.php';
    exit;
}
$isProductPage = true;
$pageTitle = 'Warisan ' . $product['name'] . ' ' . $product['edition'] . ' — ' . $product['color'] . ' | SENA';
$pageDescription = $product['description'] . ' ' . $product['movement'] . ' quartz, sapphire crystal and 5 ATM water resistance.';
$watchAlt = 'SENA Warisan ' . $product['name'] . ' ' . $product['edition'] . ', ' . $product['color'];
// Only use lifestyle artwork for the model and colour it actually depicts.
$photography = ['date-gents-burgundy' => 'product-red', 'date-gents-blue' => 'product-blue', 'date-gents-green' => 'product-green', 'chronograph-green' => 'product-forest'];
$scene = isset($photography[$id]) ? 'assets/products/pdp/scene-' . ($product['family'] === 'chronograph' ? 'chronograph-green' : $product['colorId']) . '.webp' : null;
$hasSharpRender = $product['family'] === 'date-gents';
$hasLargerRender = $product['colorId'] === 'green';
$productImage = ($hasSharpRender || $hasLargerRender) ? 'assets/products/pdp/' . $id . '.webp' : $product['image'];
$nativeWidth = $hasLargerRender ? 525 : 285;
$nativeHeight = $hasLargerRender ? 880 : 470;
$views = [['image' => $productImage, 'label' => 'Full watch', 'crop' => 'full']];
// Small specification-sheet renders cannot support enlarged close-ups.
if ($hasSharpRender) {
    $views[] = ['image' => $productImage, 'label' => 'Dial detail', 'crop' => 'dial'];
    $views[] = ['image' => $productImage, 'label' => 'Strap detail', 'crop' => 'strap'];
}
if ($scene) $views[] = ['image' => $scene, 'label' => 'In focus', 'crop' => 'scene'];
$specGroups = [
    'Brand' => ['Brand name' => 'SENA', 'Collection' => 'Warisan', 'Edition' => $product['edition'], 'Assembly' => 'Malaysia', 'Warranty' => '2-year international'],
    'Movement' => ['Movement type' => 'Japanese quartz', 'Functions' => $product['function'], 'Dial colour' => $product['color'], 'Dial & hands' => 'Brass base dial and cut hands with Swiss New-Lite C1 luminous'],
    'Case' => ['Case dimensions' => $product['size'], 'Case & crown' => '316L stainless steel', 'Crystal' => 'Sapphire with inner anti-reflective coating', 'Water resistance' => '5 ATM / 50 metres', 'Bezel' => 'Uni-directional stainless steel with aluminium ring'],
    'Strap' => ['Material' => 'Matching leather and canvas', 'Colour' => $product['color'], 'Width' => $product['strap'], 'Attachment' => 'Quick-release spring bars', 'Buckle' => '316L stainless steel'],
    'Calibre' => ['Calibre' => $product['movement'], 'Model reference' => $product['reference'], 'Case back' => '316L stainless steel with super-hardened mineral glass and logo']
];
require __DIR__ . '/app/partials/header.php';
?>
<main id="main" class="inner-page pdp-page <?= $hasSharpRender ? 'pdp-render-sharp' : 'pdp-render-limited' ?>" style="--render-width:<?= $nativeWidth ?>px;--render-height:<?= $nativeHeight ?>px">
    <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="index.php">Home</a><span>/</span><a href="warisan.php">Warisan</a><span>/</span><span><?= senaEscape($product['name']) ?></span></nav>
    <section class="pdp-hero" aria-labelledby="watch-title">
        <div class="product-gallery pdp-gallery <?= count($views) === 1 ? 'pdp-single-view' : '' ?>" aria-label="Product photographs">
            <div class="pdp-stage" tabindex="0" aria-label="Watch gallery; use left and right arrow keys to change view">
                <?php foreach ($views as $i => $view): ?><figure class="pdp-view pdp-crop-<?= senaEscape($view['crop']) ?>" data-gallery-view <?= $i ? 'hidden' : '' ?>><img src="<?= senaEscape($view['image']) ?>" alt="<?= senaEscape($watchAlt . ' — ' . $view['label']) ?>" width="570" height="940" <?= $i ? 'loading="lazy"' : 'fetchpriority="high"' ?>></figure><?php endforeach; ?>
                <div class="pdp-gallery-controls" hidden><button type="button" data-gallery-step="-1" aria-label="Previous photograph">←</button><span data-gallery-status aria-live="polite" aria-atomic="true">1 / <?= count($views) ?> · Full watch</span><button type="button" data-gallery-step="1" aria-label="Next photograph">→</button></div>
            </div>
            <div class="pdp-thumbnails" aria-label="Choose a view" hidden><?php foreach ($views as $i => $view): ?><button type="button" class="pdp-thumb pdp-crop-<?= senaEscape($view['crop']) ?>" data-gallery-index="<?= $i ?>" data-view-label="<?= senaEscape($view['label']) ?>" aria-label="Show <?= senaEscape(strtolower($view['label'])) ?>" aria-pressed="<?= $i ? 'false' : 'true' ?>"><img src="<?= senaEscape($view['image']) ?>" alt="" width="570" height="940"><span><?= senaEscape($view['label']) ?></span></button><?php endforeach; ?></div>
        </div>
        <div class="product-summary pdp-summary"><span class="pdp-badge">WARISAN COLLECTION</span>
            <h1 id="watch-title">SENA<br><?= senaEscape($product['name']) ?></h1>
            <p class="product-subtitle"><?= senaEscape($product['edition'] . ' · ' . $product['width'] . ' · ' . $product['color']) ?></p>
            <p class="pdp-description"><?= senaEscape($product['description']) ?></p>
            <p class="pdp-motto">Bold. Reliable. Timeless.</p>
            <fieldset class="variant-field">
                <legend>Colour: <?= senaEscape($product['color']) ?></legend>
                <div class="variant-links"><?php foreach ($senaColors as $colorId => $color): ?><a class="variant-swatch swatch-<?= senaEscape($colorId) ?>" href="product.php?product=<?= senaEscape($product['family'] . '-' . $colorId) ?>" aria-label="<?= senaEscape($color) ?>" <?= $product['colorId'] === $colorId ? 'aria-current="true"' : '' ?>><span class="sr-only"><?= senaEscape($color) ?></span></a><?php endforeach; ?></div>
            </fieldset>
            <div class="purchase-actions"><a class="solid-button" href="#">Buy Now <span aria-hidden="true">↗</span></a></div>
            <p class="purchase-note">Current pricing and availability at our retail partner.</p>
        </div>
    </section>
    <section id="watch-specifications" class="pdp-specifications" aria-label="Watch specifications">
        <div class="pdp-spec-grid"><?php foreach ($specGroups as $group => $specs): ?><section class="pdp-spec-column">
                    <h2><?= senaEscape($group) ?></h2>
                    <dl><?php foreach ($specs as $label => $value): ?><div>
                                <dt><?= senaEscape($label) ?></dt>
                                <dd><?= senaEscape($value) ?></dd>
                            </div><?php endforeach; ?></dl>
                </section><?php endforeach; ?></div><a class="pdp-spec-link" href="specifications.php">Explore materials &amp; craftsmanship <span aria-hidden="true">↗</span></a>
    </section>
    <section class="pdp-related" aria-labelledby="related-title">
        <div class="section-heading">
            <h2 id="related-title">YOU MAY ALSO LIKE</h2><a class="text-link" href="warisan.php">View all watches ↗</a>
        </div>
        <div class="pdp-related-track" id="pdp-related-track"><?php foreach ($senaProducts as $related): if ($related['family'] === $product['family']) continue;
                                                                    $relatedImage = ($related['family'] === 'date-gents' || $related['colorId'] === 'green') ? 'assets/products/pdp/' . $related['id'] . '.webp' : $related['image']; ?><article class="pdp-related-card<?= !empty($related['comingSoon']) ? ' is-coming-soon' : '' ?>"><?php $relatedTag = !empty($related['comingSoon']) ? 'div' : 'a'; ?><<?= $relatedTag ?> class="pdp-related-link" <?= empty($related['comingSoon']) ? 'href="' . senaEscape($related['url']) . '"' : '' ?>><?php if (!empty($related['comingSoon'])): ?><span class="coming-soon-badge">Coming Soon</span><?php endif; ?><div class="pdp-related-image"><img src="<?= senaEscape($relatedImage) ?>" alt="<?= senaEscape('SENA ' . $related['name'] . (!empty($related['comingSoon']) ? ' - coming soon' : ' ' . $related['edition'] . ', ' . $related['color'])) ?>" width="570" height="940" loading="lazy"></div>
                        <div class="pdp-related-label">
                            <p>SENA</p>
                            <h3><?= senaEscape($related['name']) ?></h3><?php if (empty($related['comingSoon'])): ?><span><?= senaEscape($related['edition'] . ' · ' . $related['color']) ?></span><?php endif; ?>
                        </div>
                    </<?= $relatedTag ?>>
                </article><?php endforeach; ?></div>
        <div class="pdp-related-controls" hidden><button type="button" data-related-step="-1" aria-controls="pdp-related-track" aria-label="Previous watches">←</button><button type="button" data-related-step="1" aria-controls="pdp-related-track" aria-label="Next watches">⟶</button></div>
    </section>
    <section class="pdp-feature" aria-labelledby="dial-title">
        <div class="pdp-feature-image pdp-feature-dial"><img src="<?= senaEscape($productImage) ?>" alt="<?= senaEscape($watchAlt . ' dial detail') ?>" width="570" height="940" loading="lazy"></div>
        <div class="pdp-feature-copy">
            <p class="eyebrow">CRAFTED IN EVERY DETAIL</p>
            <h2 id="dial-title">A DIAL THAT<br>SPEAKS DEPTH</h2>
            <p>A considered dial, luminous hands and sapphire crystal. Every element brings together clarity, durability and timeless appeal.</p><a class="pdp-arrow-link" href="#watch-specifications">Explore Details <span aria-hidden="true">↗</span></a>
        </div>
    </section>
    <section class="pdp-updates" aria-labelledby="updates-title">
        <h2 id="updates-title">Explore our<br>latest updates</h2>
        <p>Discover the details behind Warisan. Thoughtful materials, purposeful design and a watch made to move with you.</p><a class="pdp-updates-button" href="#adventure-title" aria-label="Explore the next feature"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 12h16m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg></a>
    </section>
    <section class="pdp-feature pdp-feature-reverse" aria-labelledby="adventure-title">
        <div class="pdp-feature-image <?= $scene ? 'pdp-feature-scene' : 'pdp-feature-watch' ?>"><img src="<?= senaEscape($scene ?? $productImage) ?>" alt="<?= senaEscape($watchAlt) ?>" width="570" height="940" loading="lazy"></div>
        <div class="pdp-feature-copy">
            <p class="eyebrow">BUILT FOR<br>WHAT MOVES YOU</p>
            <h2 id="adventure-title">ADVENTURE<br>IN EVERY ANGLE</h2>
            <p>Rugged yet refined. A stainless steel case and quick-release straps bring everyday versatility to your Warisan, wherever the day takes you.</p><a class="pdp-arrow-link" href="owners-guide.php">Ownership &amp; Care <span aria-hidden="true">↗</span></a>
        </div>
    </section>
    <section class="pdp-social" aria-labelledby="social-title">
        <div class="section-heading">
            <h2 id="social-title">LIFE WITH SENA</h2><a class="text-link" href="heritage.php">Our story ↗</a>
        </div>
        <div class="pdp-social-grid"><img src="assets/products/pdp/scene-burgundy.webp" alt="Burgundy SENA Compass Explorer" width="423" height="546" loading="lazy"><img src="assets/products/pdp/lifestyle.webp" alt="A SENA watch worn in everyday life" width="600" height="900" loading="lazy"><img src="assets/products/pdp/scene-blue.webp" alt="Blue SENA Compass Explorer" width="423" height="546" loading="lazy"><img src="assets/products/pdp/scene-green.webp" alt="Green SENA Compass Explorer" width="423" height="546" loading="lazy"></div>
    </section>
</main>
<?php require __DIR__ . '/app/partials/footer.php'; ?>
