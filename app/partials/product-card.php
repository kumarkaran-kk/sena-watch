<?php
function senaProductCard(array $product): void {
    $comingSoon = !empty($product['comingSoon']);
    $tag = $comingSoon ? 'div' : 'a';
?>
    <article class="catalog-card" data-family="<?= senaEscape($product['family']) ?>">
        <?php if ($comingSoon): ?><span class="coming-soon-badge">Coming Soon</span><?php endif; ?>
        <<?= $tag ?> class="catalog-image" <?= $comingSoon ? '' : 'href="' . senaEscape($product['url']) . '"' ?>><img src="<?= senaEscape($product['image']) ?>" alt="SENA Warisan <?= senaEscape($product['name'] . ' ' . $product['edition'] . ', ' . $product['color']) ?>" width="570" height="940" loading="lazy"></<?= $tag ?>>
        <div class="catalog-card-copy"><p class="eyebrow"><?= senaEscape($product['edition']) ?> · <?= senaEscape($product['width']) ?> · Quartz</p><h3><?php if (!$comingSoon): ?><a href="<?= senaEscape($product['url']) ?>"><?php endif; ?><?= senaEscape($product['name']) ?><?php if (!$comingSoon): ?></a><?php endif; ?></h3><p><?= senaEscape($product['color']) ?> <span aria-hidden="true">/</span> Warisan</p><?php if (!$comingSoon): ?><a class="text-link" href="<?= senaEscape($product['url']) ?>">Discover timepiece <span aria-hidden="true">↗</span></a><?php else: ?><p class="catalog-availability">Launching soon</p><?php endif; ?></div>
    </article>
<?php }
