<?php
function senaProductCard(array $product): void { ?>
    <article class="catalog-card" data-family="<?= senaEscape($product['family']) ?>">
        <a class="catalog-image" href="<?= senaEscape($product['url']) ?>"><img src="<?= senaEscape($product['image']) ?>" alt="SENA Warisan <?= senaEscape($product['name'] . ' ' . $product['edition'] . ', ' . $product['color']) ?>" width="570" height="940" loading="lazy"></a>
        
        <div class="catalog-card-copy"><p class="eyebrow"><?= senaEscape($product['edition']) ?> · <?= senaEscape($product['width']) ?> · Quartz</p><h3><a href="<?= senaEscape($product['url']) ?>"><?= senaEscape($product['name']) ?></a></h3><p><?= senaEscape($product['color']) ?> <span aria-hidden="true">/</span> Warisan</p><a class="text-link" href="<?= senaEscape($product['url']) ?>">Discover timepiece <span aria-hidden="true">↗</span></a></div>
    </article>
<?php }
