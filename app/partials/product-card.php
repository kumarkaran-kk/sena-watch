<?php
function senaProductCard(array $product): void {
    $comingSoon = !empty($product['comingSoon']);
    $tag = $comingSoon ? 'div' : 'a';
?>
    <article class="catalog-card<?= $comingSoon ? ' is-coming-soon' : '' ?>" data-family="<?= senaEscape($product['family']) ?>">
        <?php if ($comingSoon): ?><span class="coming-soon-badge">Coming Soon</span><?php endif; ?>
        <<?= $tag ?> class="catalog-image" <?= $comingSoon ? '' : 'href="' . senaEscape($product['url']) . '"' ?>><img src="<?= senaEscape($product['image']) ?>" alt="<?= senaEscape('SENA Warisan ' . $product['name'] . ($comingSoon ? ' — coming soon' : ' ' . $product['edition'] . ', ' . $product['color'])) ?>" width="570" height="940" loading="lazy"></<?= $tag ?>>
        <div class="catalog-card-copy">
            <?php if (!$comingSoon): ?><p class="eyebrow"><?= senaEscape($product['edition']) ?> · <?= senaEscape($product['width']) ?> · Quartz</p><?php endif; ?>
            <h3><?php if (!$comingSoon): ?><a href="<?= senaEscape($product['url']) ?>"><?php endif; ?><?= senaEscape($product['name']) ?><?php if (!$comingSoon): ?></a><?php endif; ?></h3>
            <?php if (!$comingSoon): ?><p><?= senaEscape($product['color']) ?> <span aria-hidden="true">/</span> Warisan</p><a class="text-link" href="<?= senaEscape($product['url']) ?>">Discover timepiece <span aria-hidden="true">↗</span></a><?php endif; ?>
        </div>
    </article>
<?php }
