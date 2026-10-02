<?php
// Product specifications: supplied website PDF, WP Quartz presentation and product sheets.
// Current available models use quartz movements.
$senaColors = ['burgundy' => 'Burgundy', 'blue' => 'Blue', 'green' => 'Green'];
$senaFamilies = [
    'date-gents' => ['name' => '3-Hands Date', 'edition' => 'Gents', 'reference' => 'SA-JQ-G26001-M', 'movement' => 'Miyota 2315', 'size' => '40 × 47.5 mm', 'width' => '40 mm', 'strap' => '20–18 mm', 'function' => 'Hours, minutes, seconds and date window', 'description' => 'Everyday classic utility. A clear, three-hand dial and date window bring quiet confidence to a practical watch made for daily life.'],
    'chronograph' => ['comingSoon' => true, 'name' => '2-Eyes Chronograph', 'edition' => 'Gents', 'reference' => 'SA-JQ-G26004M', 'movement' => 'Miyota OS21', 'size' => '40 × 47.5 mm', 'width' => '40 mm', 'strap' => '20–18 mm', 'function' => 'Chronograph, 24-hour sub-dial and date window', 'description' => 'Tactical precision. Independent stopwatch timing and a 24-hour sub-dial give this everyday tool watch a purposeful, two-eye profile.'],
];
$senaProducts = [];
foreach ($senaFamilies as $familyId => $family) {
    foreach ($senaColors as $colorId => $color) {
        $id = $familyId . '-' . $colorId;
        $senaProducts[$id] = $family + ['id' => $id, 'family' => $familyId, 'colorId' => $colorId, 'color' => $color, 'image' => 'assets/products/' . $id . '.webp', 'url' => 'product.php?product=' . $id];
    }
}
