<?php
$isHomePage = true;
require __DIR__ . '/app/partials/header.php';
?>
        <main id="main">
            <section class="hero image-stage" aria-label="SENA — modern watch style" data-prototype="hero">
                <img class="stage-photo" src="assets/optimized/hero.webp"
                    alt="Burgundy SENA Warisan 3-Hands Date watch on red leather" width="1900" height="1089"
                    fetchpriority="high">
                <div class="hero-copy prototype-copy">
                    <h1>Modern watch style</h1>
                    <p>Engineered for daily life</p><a class="white-arrow" href="#products"
                        aria-label="Explore our watches"><img src="assets/images/group36.svg" alt="" width="64"
                            height="64"></a>
                </div>
                <a class="corner-arrow" href="#products" aria-label="Explore the collection"><img
                        src="assets/images/group35.svg" alt="" width="113" height="113"></a>
            </section>
            <section class="about" id="about" aria-labelledby="about-title">
                <h2 id="about-title">About Us</h2>
                <p>SENA was born to ensure that the art of classic watchmaking remains vibrant for future generations.
                    While smart tech surrounds us, SENA stands for something permanent: a reliable, practical tool watch
                    that simply tells time and date with quiet confidence. It’s built to be grabbed as reflexively as
                    your car keys before stepping out to face the world.</p><button class="text-link"
                    data-open="about">Read More</button>
            </section>
            <section class="chief-story" id="chief" aria-labelledby="chief-title">
                <div class="chief-video">
                    <iframe src="https://www.youtube-nocookie.com/embed/6ym0e4vxdwA"
                        title="A message from SENA’s Chief" width="960" height="540" loading="lazy"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="chief-copy">
                    <p class="eyebrow">THE STORY BEHIND SENA</p>
                    <h2 id="chief-title">A message from our Chief</h2>
                    <p>SENA was born to ensure that the art of classic watchmaking remains vibrant for future
                        generations. While smart tech surrounds us, SENA stands for something permanent: a reliable,
                        practical tool watch that simply tells time and date with quiet confidence.</p>
                    <a class="text-link" href="https://www.youtube.com/watch?v=6ym0e4vxdwA"
                        target="_blank" rel="noopener noreferrer">Watch on YouTube <span aria-hidden="true">↗</span></a>
                </div>
            </section>
            <section class="products" id="products" aria-label="Featured Warisan watches">
                <h2 class="sr-only">Explore the Warisan collection</h2>
                <div class="product-track" id="product-track" tabindex="0"
                    aria-label="Watch collection, scroll for more">
                    <article class="product-card" data-product="red"><button class="product-link" data-detail="red"
                            aria-label="View burgundy SENA Warisan 3-Hands Date"><img class="product-photo"
                                src="assets/optimized/product-red.webp" alt="Burgundy SENA Warisan 3-Hands Date" width="423"
                                height="546" loading="lazy"><span class="product-label"><span>SENA</span>Warisan
                                3-Hands Date</span></button></article>
                    <article class="product-card" data-product="green"><button class="product-link" data-detail="green"
                            aria-label="View green SENA Warisan 3-Hands Date"><img class="product-photo"
                                src="assets/optimized/product-green.webp" alt="Green SENA Warisan 3-Hands Date" width="423"
                                height="546" loading="lazy"><span class="product-label"><span>SENA</span>Warisan
                                3-Hands Date</span></button></article>
                    <article class="product-card" data-product="blue"><button class="product-link" data-detail="blue"
                            aria-label="View blue SENA Warisan 3-Hands Date"><img class="product-photo"
                                src="assets/optimized/product-blue.webp" alt="Blue SENA Warisan 3-Hands Date" width="423"
                                height="546" loading="lazy"><span class="product-label"><span>SENA</span>Warisan
                                3-Hands Date</span></button></article>
                    <article class="product-card" data-product="chronograph-green"><span class="coming-soon-badge">Coming Soon</span><button class="product-link" disabled
                            aria-label="Green SENA Warisan Chronograph ? coming soon"><img class="product-photo"
                                src="assets/optimized/product-forest.webp"
                                alt="Green Warisan Chronograph in a forest setting" width="423" height="546"
                                loading="lazy"><span class="product-label"><span>SENA</span>Warisan
                                Chronograph</span></button></article>
                </div>
                <div class="product-controls">
                    <div class="slider-arrows"><button data-products-prev aria-label="Previous watches"><img
                                src="assets/images/property1-default.svg" alt="" width="44" height="44"></button><button
                            data-products-next aria-label="Next watches"><img src="assets/images/property1-default1.svg"
                                alt="" width="77" height="44"></button></div>
                    <div class="product-dots" aria-label="Choose collection page"></div>
                </div>
            </section>
            <section class="materials image-stage" id="materials" aria-label="Technical specifications and materials"
                data-prototype="materials"><img class="stage-photo" src="assets/optimized/materials.webp"
                    alt="SENA watch with red woven strap on burgundy velvet" width="1900" height="1089"
                    loading="lazy">
                <div class="materials-copy prototype-copy">
                    <h2>TECHNICAL SPECIFICATIONS &amp; MATERIALS</h2>
                    <p>Engineered for daily life</p><a class="white-arrow" href="specifications.php"
                        aria-label="Discover watch features"><img src="assets/images/group36.svg" alt="" width="64"
                            height="64"></a>
                </div><a class="corner-arrow" href="specifications.php" aria-label="Explore technical specifications"><img
                        src="assets/images/group35.svg" alt="" width="113" height="113"></a>
            </section>
            <section class="editorial" aria-labelledby="editorial-title">
                <h2 id="editorial-title"><span>Elegance</span><span>Meets</span><span>Precision</span></h2>
                <div class="editorial-content">
                <p class="editorial-story">In an age of endless screens, SENA brings back the pure, intentional ritual of wearing a real watch. Engineered for daily life, crafted for generations.</p>
                <div class="editorial-cta">
                    <a class="expanding-link"
                        href="warisan.php"><span class="circle"><img src="assets/images/arrow8.svg" alt="" width="22"
                                height="22"></span><span class="expanding-label">Explore Our Collection</span></a>
                </div>
                </div>
            </section>
            <section class="collection" id="collection" data-active-color="green" aria-label="Warisan 3-Hands Date color collection"
                aria-roledescription="carousel">
                <div class="collection-main"></div>
                <div class="collection-intro">
                    <h2>SENA</h2>
                    <p>Practical timepieces, assembled in Malaysia.<br>Crafted for generations.</p>
                </div><span class="availability">AVAILABLE</span>
                <div class="watch-window">
                    <div class="watch-slides"><img class="watch-slide is-active" data-watch="green"
                            src="assets/optimized/watch-green.webp" alt="Green Warisan 3-Hands Date" width="640"
                            height="819" loading="lazy"><img class="watch-slide" data-watch="red"
                            src="assets/optimized/watch-red.webp" alt="Burgundy Warisan 3-Hands Date" width="640"
                            height="819" loading="lazy" aria-hidden="true"><img class="watch-slide" data-watch="blue"
                            src="assets/optimized/watch-blue.webp" alt="Blue Warisan 3-Hands Date" width="640" height="819"
                            loading="lazy" aria-hidden="true"></div>
                </div>
                <div class="watch-indicators"><button data-color="green" aria-label="Show green watch"
                        aria-pressed="true">01</button><button data-color="red" aria-label="Show burgundy watch"
                        aria-pressed="false">02</button><button data-color="blue" aria-label="Show blue watch"
                        aria-pressed="false">03</button></div>
                <p class="collection-caption">A legacy made to be worn</p>
                <div class="collection-bottom"><button class="expanding-link light" id="collection-detail"><span
                            class="circle"><img src="assets/images/arrow8.svg" alt="" width="22"
                                height="22"></span><span class="expanding-label">Buy Now</span></button><button
                        class="rotation-toggle" aria-label="Pause watch rotation">Pause</button>
                    <div class="watch-thumbnails"><button data-color="red" aria-label="Select burgundy watch"
                            aria-pressed="false"><img src="assets/optimized/watch-red.webp" alt="" width="100"
                                height="140" loading="lazy"></button><button data-color="blue"
                            aria-label="Select blue watch" aria-pressed="false"><img
                                src="assets/optimized/watch-blue.webp" alt="" width="100" height="140"
                                loading="lazy"></button><button data-color="green" aria-label="Select green watch"
                            aria-pressed="true"><img src="assets/optimized/watch-green.webp" alt="" width="100"
                                height="140" loading="lazy"></button></div>
                </div>
            </section>
            <section class="coming-soon" id="coming-soon" aria-labelledby="coming-title"><img
                    src="assets/optimized/coming-soon.webp" alt="Preview of a gold and steel SENA watch" width="1706"
                    height="922" loading="lazy">
                <div>
                    <h2 id="coming-title">COMING SOON</h2>
                    <p>THE NEXT CHAPTER</p>
                </div>
            </section>
            <section class="legacy" id="legacy" aria-label="The SENA legacy">
                <blockquote aria-live="polite" aria-atomic="true"><span aria-hidden="true">“</span><p id="legacy-quote">We built SENA for the new generation—from young hustlers to seasoned collectors—to prove that world-class horology belongs right here.</p></blockquote><img class="legacy-lifestyle"
                    src="assets/optimized/lifestyle.webp" alt="SENA watch worn every day" width="650" height="650"
                    loading="lazy">
                <div class="legacy-side"><img id="legacy-photo" src="assets/optimized/watch-trio.webp"
                        alt="Three SENA watches with colorful straps" width="379" height="379" loading="lazy">
                    <h2>Trusted Worldwide<br>For Excellence</h2>
                    <div class="legacy-controls"><button data-legacy="-1" aria-label="Previous SENA image"><img
                                src="assets/images/group35.svg" alt="" width="48" height="48"></button><button
                            data-legacy="1" aria-label="Next SENA image"><img src="assets/images/group35.svg" alt=""
                                width="48" height="48"></button></div>
                </div>
            </section>
            <section class="features" id="features" aria-labelledby="features-title" tabindex="0">
                <h2 id="features-title" class="sr-only">Designed for a lifetime of moments</h2>
                <svg class="feature-markings" viewBox="0 0 1900 1047" fill="none" aria-hidden="true" focusable="false">
                    <path class="feature-frame" pathLength="100" d="M350 27H1774C1829 27 1874 72 1874 127V1018" />
                    <path class="feature-frame" pathLength="100" d="M1575 1020H151C96 1020 51 975 51 920V29" />
                    <g class="feature-connectors">
                        <path pathLength="100" d="M449 261V347Q449 378 480 378H691" />
                        <path pathLength="100" d="M449 496H691" />
                        <path pathLength="100" d="M449 731V645Q449 614 480 614H691" />
                        <path pathLength="100" d="M1482 261V347Q1482 378 1451 378H1240" />
                        <path pathLength="100" d="M1482 496H1240" />
                        <path pathLength="100" d="M1482 731V645Q1482 614 1451 614H1240" />
                    </g>
                    <g fill="currentColor">
                        <circle cx="449" cy="261" r="5.5" /><circle cx="449" cy="496" r="5.5" /><circle cx="449" cy="731" r="5.5" />
                        <circle cx="1482" cy="261" r="5.5" /><circle cx="1482" cy="496" r="5.5" /><circle cx="1482" cy="731" r="5.5" />
                    </g>
                </svg>
                <div class="feature-wordmarks" aria-hidden="true"><span>SENA</span><span>SENA</span><span>SENA</span>
                </div><img class="feature-watch" src="assets/optimized/watch-red.webp"
                    alt="SENA Warisan 3-Hands Date, burgundy dial and strap" width="574" height="861" loading="lazy">
                <div class="feature-item feature-quality">
                    <h3>Quality Materials</h3>
                    <p>Crafted using surgical-grade 316L stainless steel and scratch-resistant sapphire crystal.</p>
                </div>
                <div class="feature-item feature-design">
                    <h3>Modern Design</h3>
                    <p>Defined by modern utility, clean geometry, and timeless versatility.</p>
                </div>
                <div class="feature-item feature-movement">
                    <h3>High-Precision Movement</h3>
                    <p>Powered by precise Japanese Miyota quartz movements.</p>
                </div>
                <div class="feature-item feature-comfort">
                    <h3>Everyday Comfort</h3>
                    <p>Lightweight, balanced ergonomics engineered for active, all-day wrist comfort.</p>
                </div>
                <div class="feature-item feature-skin">
                    <h3>Hypoallergenic</h3>
                    <p>Surgical-grade steel and non-irritating strap materials ensure gentle skin contact.</p>
                </div>
                <div class="feature-item feature-heritage">
                    <h3>Malaysian Heritage</h3>
                    <p>Proudly recognised as one of the few watch brands assembled in Malaysia.</p>
                </div>
            </section>
            <section class="journal" id="journal" aria-labelledby="journal-title">
                <div>
                    <p class="eyebrow">Latest Blogs</p>
                    <h2 id="journal-title">Fresh updates and <span>stories</span> you <span>shouldn’t</span> miss</h2>
                </div>
                <div class="journal-description">
                    <p>Stay informed with our latest updates, product launches, &amp; style insights. Explore stories
                        that keep you connected with new trends.</p><button class="expanding-link dark"
                        data-open="blog"><span class="circle"><img src="assets/images/arrow11.svg" alt="" width="30"
                                height="30"></span><span class="expanding-label">View All Blogs</span></button>
                </div>
            </section>
        </main>
<?php require __DIR__ . '/app/partials/footer.php'; ?>
