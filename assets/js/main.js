(() => {
  'use strict';
  const config = JSON.parse(document.getElementById('sena-config').textContent);
  const $ = (selector, root = document) => root.querySelector(selector);
  const $$ = (selector, root = document) => [...root.querySelectorAll(selector)];
  const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)');
  const products = JSON.parse(document.getElementById('sena-catalog').textContent);
  const aliases = {red:'date-gents-burgundy',green:'date-gents-green',blue:'date-gents-blue'};
  const productId = id => aliases[id] || id;
  // Remove the retired wishlist data from returning visitors' browsers.
  try { localStorage.removeItem('sena-saved'); } catch { /* Storage may be unavailable. */ }
  function safeUrl(value) {
    if (!value) return '';
    try { const url = new URL(value, location.href); return ['http:', 'https:'].includes(url.protocol) ? url.href : ''; } catch { return ''; }
  }
  function visit(value) { const url = safeUrl(value); if (!url) return false; location.assign(url); return true; }
  const dialog = $('#site-dialog');
  const content = $('#dialog-content');
  let toastTimer;
  function toast(message) { clearTimeout(toastTimer); $('#toast').textContent = message; $('#toast').hidden = false; toastTimer = setTimeout(() => { $('#toast').hidden = true; }, 3200); }
  function showDialog(markup) {
    content.innerHTML = markup;
    if (!dialog.open) dialog.showModal();
    document.body.classList.add('modal-open');
  }
  $('.dialog-close').addEventListener('click', () => dialog.close());
  dialog.addEventListener('close', () => document.body.classList.remove('modal-open'));
  dialog.addEventListener('click', event => {
    if (event.target !== dialog) return;
    const r = dialog.getBoundingClientRect();
    if (event.clientX < r.left || event.clientX > r.right || event.clientY < r.top || event.clientY > r.bottom) dialog.close();
  });
  function showProduct(id) {
    const product = products[productId(id)];
    if (product) visit(product.url);
  }
  function resultMarkup(ids) {
    return ids.map(id => `<button class="result-row" data-detail="${id}"><img src="${products[id].image}" alt="" width="60" height="80"><span>${products[id].name}<small>${products[id].edition} · ${products[id].color}</small></span><span aria-hidden="true">↗</span></button>`).join('');
  }
  const info = {
    about: ['About SENA', 'SENA was born to ensure that the art of classic watchmaking remains vibrant for future generations. While smart tech surrounds us, SENA stands for something permanent: a reliable, practical tool watch that simply tells time and date with quiet confidence. It’s built to be grabbed as reflexively as your car keys before stepping out to face the world.', 'A true legacy isn’t meant to be locked away — it is built to be worn, lived in, and passed down through generations.'],
    blog: ['The SENA Journal', 'New stories, product launches, and style insights are coming soon.'],
    contact: ['Contact SENA', 'Our contact details will be available here soon. In the meantime, discover our watches.'],
    services: ['SENA Services', 'Service and support information will be available here soon.'],
    account: ['SENA Watches', 'Explore the collection. Purchases are handled by our retail partners.'],
    privacy: ['Privacy Policy', 'Our privacy policy will be published here soon.'],
    shipping: ['Shipping Policy', 'Shipping options and delivery information are provided by the retail partner when you purchase.'],
    terms: ['Terms & Conditions', 'Purchase terms are provided by the retail partner. SENA’s website terms will be published here soon.'],
    warranty: ['Warranty Policy', 'Warranty details will be available here soon. Please confirm the applicable warranty with the retail partner before purchasing.']
  };
  function openPanel(type) {
    if (visit(config.urls?.[type])) return;
    if (type === 'search') {
      showDialog(`<h2 id="dialog-title">Find your SENA</h2><label class="sr-only" for="watch-search">Search watches by name or color</label><input class="search-input" id="watch-search" type="search" placeholder="Try chronograph, ladies, or green" autocomplete="off"><p class="sr-only" id="search-status" role="status"></p><div id="search-results">${resultMarkup(Object.keys(products))}</div>`);
      $('#watch-search').addEventListener('input', event => {
        const query = event.target.value.trim().toLowerCase();
        const ids = Object.keys(products).filter(id => (`sena ${products[id].name} ${products[id].edition} ${products[id].movement} ${products[id].color} ${id}`).toLowerCase().includes(query));
        $('#search-results').innerHTML = ids.length ? resultMarkup(ids) : '<p class="dialog-copy">No watches found. Try a different name or color.</p>';
        $('#search-status').textContent = `${ids.length} watches found`;
      });
      $('#watch-search').focus(); return;
    }
    const [title, ...paragraphs] = info[type] || info.contact;
    showDialog(`<h2 id="dialog-title">${title}</h2><div class="dialog-copy">${paragraphs.map(text => `<p>${text}</p>`).join('')}</div>`);
  }
  document.addEventListener('click', event => {
    const button = event.target.closest('button'); if (!button) return;
    if (button.dataset.open) openPanel(button.dataset.open);
    if (button.dataset.detail) showProduct(button.dataset.detail);
    if (button.hasAttribute('data-browse')) { dialog.close(); location.assign('warisan.php'); }
    if (button.dataset.purchase) visit(config.purchaseUrls?.[button.dataset.purchase] || config.storeUrl);
    if (button.dataset.social && !visit(config.social?.[button.dataset.social])) toast('Our social profiles will be available soon.');
  });
  $$('[data-filter]').forEach(button => button.addEventListener('click', () => {
    $$('[data-filter]').forEach(item => item.setAttribute('aria-pressed', String(item === button)));
    let count = 0;
    $$('.catalog-card').forEach(card => {card.hidden = button.dataset.filter !== 'all' && card.dataset.family !== button.dataset.filter; if (!card.hidden) count++;});
    $('.catalog-count').textContent = count + ' timepieces';
  }));
  const menus = [[$('.collection-toggle'), $('#collection-links')], [$('.mobile-menu-button'), $('#mobile-navigation')]];
  function closeMenus() { menus.forEach(([button,panel]) => { button.setAttribute('aria-expanded','false'); panel.hidden = true; }); $$('#mobile-navigation details[open]').forEach(detail => { detail.open = false; }); }
  menus.forEach(([button,panel]) => button.addEventListener('click', () => { const opening = panel.hidden; closeMenus(); panel.hidden = !opening; button.setAttribute('aria-expanded',String(opening)); }));
  document.addEventListener('click', event => { if (!event.target.closest('.collection-menu, .mobile-menu-button, #mobile-navigation')) closeMenus(); if (event.target.closest('#mobile-navigation a, #collection-links a')) closeMenus(); });
  document.addEventListener('keydown', event => { if (event.key === 'Escape') { if(dialog.open){event.preventDefault();dialog.close();} const active = menus.find(([,panel]) => !panel.hidden); closeMenus(); if(active) active[0].focus(); } });
  const track = $('#product-track');
  if (track) {
    let pageStops = [];
    function setupProductPages() {
      const first = track.firstElementChild;
      const step = first.getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap);
      const visible = Math.max(1,Math.floor((track.clientWidth + parseFloat(getComputedStyle(track).gap)) / step));
      const max = Math.max(0,track.scrollWidth-track.clientWidth);
      $('.product-controls').hidden = max <= 2;
      pageStops = [0];
      for (let offset = visible*step; offset < max - 2; offset += visible*step) pageStops.push(offset);
      if (max > 2) pageStops.push(max);
      $('.product-dots').innerHTML = pageStops.map((_,i) => `<button aria-label="Collection page ${i+1}" data-product-page="${i}"></button>`).join('');
      syncProductPages();
    }
    function currentPage() { return pageStops.reduce((best,offset,i) => Math.abs(offset-track.scrollLeft) < Math.abs(pageStops[best]-track.scrollLeft) ? i : best,0); }
    function syncProductPages() { const active=currentPage(); $$('[data-product-page]').forEach((b,i) => b.setAttribute('aria-current',String(i===active))); $('[data-products-prev]').disabled=track.scrollLeft<2; $('[data-products-next]').disabled=track.scrollLeft>=track.scrollWidth-track.clientWidth-2; }
    function moveProducts(page) { track.scrollTo({left:pageStops[Math.max(0,Math.min(pageStops.length-1,page))],behavior:reducedMotion.matches?'instant':'smooth'}); }
    $('[data-products-prev]').addEventListener('click',()=>moveProducts(currentPage()-1));
    $('[data-products-next]').addEventListener('click',()=>moveProducts(currentPage()+1));
    $('.product-dots').addEventListener('click',event=>{const button=event.target.closest('[data-product-page]');if(button)moveProducts(Number(button.dataset.productPage));});
    track.addEventListener('scroll',syncProductPages,{passive:true});
    track.addEventListener('keydown',event=>{if(event.target!==track)return;if(['ArrowRight','ArrowLeft'].includes(event.key)){event.preventDefault();moveProducts(currentPage()+(event.key==='ArrowRight'?1:-1));}});
    new ResizeObserver(setupProductPages).observe(track);
    setupProductPages();

  }

  const collection = $('#collection');
  if (collection) {
    const colors = ['green','red','blue'];
    // Give every watch three full seconds after its 300ms entrance transition.
    const rotationDelay = 3300;
    let colorIndex=0, timer, paused=reducedMotion.matches, inView=false;
    const rotationToggle=$('.rotation-toggle');
    function syncRotationButton(){rotationToggle.textContent=paused?'Play':'Pause';rotationToggle.setAttribute('aria-label',`${paused?'Play':'Pause'} watch rotation`);}
    function scheduleRotation(){clearTimeout(timer);if(paused||!inView||document.hidden)return;timer=setTimeout(()=>{selectColor((colorIndex+1)%3);scheduleRotation();},rotationDelay);}
    function selectColor(index){const previous=colorIndex;colorIndex=index;collection.dataset.activeColor=colors[index];$$('[data-watch]').forEach((img,i)=>{img.classList.toggle('is-active',i===index);img.classList.toggle('is-before',i===previous&&i!==index);img.setAttribute('aria-hidden',String(i!==index));});$$('[data-color]').forEach(button=>button.setAttribute('aria-pressed',String(button.dataset.color===colors[index])));}
    $$('[data-color]',collection).forEach(button=>button.addEventListener('click',()=>{selectColor(colors.indexOf(button.dataset.color));scheduleRotation();}));
    rotationToggle.addEventListener('click',()=>{paused=!paused;syncRotationButton();scheduleRotation();});
    $('#collection-detail').addEventListener('click',()=>{if(!visit(config.purchaseUrls?.[colors[colorIndex]] || config.storeUrl))showProduct(colors[colorIndex]);});
    new IntersectionObserver(entries=>{const visible=entries[0].isIntersecting&&entries[0].intersectionRatio>=.2;if(visible!==inView){inView=visible;scheduleRotation();}},{threshold:[0,.2]}).observe(collection);
    document.addEventListener('visibilitychange',scheduleRotation);
    reducedMotion.addEventListener('change',()=>{if(reducedMotion.matches)paused=true;syncRotationButton();scheduleRotation();});
    syncRotationButton();

  }

  const legacyImages=[
    ['watch-trio','Three SENA watches with colorful straps','We built SENA for the new generation—from young hustlers to seasoned collectors—to prove that world-class horology belongs right here.'],
    ['lifestyle','A SENA watch worn every day','A true legacy isn’t meant to be locked away—it is built to be worn, lived in, and passed down through generations.'],
    ['packaging','SENA presentation box','In an age of endless screens, SENA brings back the pure, intentional ritual of wearing a real watch.']
  ];
  const legacySection = $('#legacy');
  if (legacySection) {
    let legacyIndex=0, legacyTimer, legacyVisible=false;
    const showLegacy = step => {
      legacyIndex=(legacyIndex+step+legacyImages.length)%legacyImages.length;
      const [src,alt,quote]=legacyImages[legacyIndex];
      $('#legacy-photo').src=`assets/optimized/${src}.webp`;
      $('#legacy-photo').alt=alt;
      $('#legacy-quote').textContent=quote;
    };
    const scheduleLegacy = () => {
      clearTimeout(legacyTimer);
      if (!legacyVisible || document.hidden) return;
      legacyTimer=setTimeout(()=>{showLegacy(1);scheduleLegacy();},5000);
    };
    $$('[data-legacy]',legacySection).forEach(button=>button.addEventListener('click',()=>{
      showLegacy(Number(button.dataset.legacy));
      scheduleLegacy();
    }));
    new IntersectionObserver(entries=>{
      const visible=entries[0].isIntersecting && entries[0].intersectionRatio>=.2;
      if (visible!==legacyVisible) { legacyVisible=visible; scheduleLegacy(); }
    },{threshold:[0,.2]}).observe(legacySection);
    document.addEventListener('visibilitychange',scheduleLegacy);
  }
  const comingSoon = $('#coming-soon');
  if (comingSoon) {
    const moveLight = event => {
      const bounds = comingSoon.getBoundingClientRect();
      comingSoon.style.setProperty('--light-x', `${event.clientX - bounds.left}px`);
      comingSoon.style.setProperty('--light-y', `${event.clientY - bounds.top}px`);
      comingSoon.classList.add('is-lit');
    };
    const hideLight = () => comingSoon.classList.remove('is-lit');
    comingSoon.addEventListener('pointerenter', event => { if (event.pointerType !== 'touch') moveLight(event); });
    comingSoon.addEventListener('pointermove', moveLight, {passive:true});
    comingSoon.addEventListener('pointerdown', moveLight, {passive:true});
    comingSoon.addEventListener('pointerleave', hideLight);
    comingSoon.addEventListener('pointercancel', hideLight);
    comingSoon.addEventListener('pointerup', event => { if (event.pointerType === 'touch') hideLight(); });
    window.addEventListener('blur', hideLight);
  }
  $('#copyright-year').textContent=String(new Date().getFullYear());
})();
