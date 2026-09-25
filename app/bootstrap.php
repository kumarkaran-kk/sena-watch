<?php
// Shared application setup. Public page URLs remain relative to the web root.
$senaConfig = require __DIR__ . '/config/site.php';
$senaStoreUrl = $senaConfig['storeUrl'];
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data/catalog.php';
require_once __DIR__ . '/partials/product-card.php';
