(() => {
  'use strict';
  const gallery = document.querySelector('.pdp-gallery');
  if (!gallery) return;
  const views = [...gallery.querySelectorAll('[data-gallery-view]')];
  const thumbs = [...gallery.querySelectorAll('[data-gallery-index]')];
  const status = gallery.querySelector('[data-gallery-status]');
  let active = 0;
  const show = index => {
    active = (index + views.length) % views.length;
    views.forEach((view, i) => { view.hidden = i !== active; });
    thumbs.forEach((thumb, i) => thumb.setAttribute('aria-pressed', String(i === active)));
    status.textContent = `${active + 1} / ${views.length} · ${thumbs[active].dataset.viewLabel}`;
  };
  gallery.querySelector('.pdp-thumbnails').hidden = views.length < 2;
  gallery.querySelector('.pdp-gallery-controls').hidden = views.length < 2;
  thumbs.forEach((thumb, i) => thumb.addEventListener('click', () => show(i)));
  gallery.querySelectorAll('[data-gallery-step]').forEach(button => button.addEventListener('click', () => show(active + Number(button.dataset.galleryStep))));
  gallery.querySelector('.pdp-stage').addEventListener('keydown', event => {
    if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;
    event.preventDefault();
    show(event.key === 'Home' ? 0 : event.key === 'End' ? views.length - 1 : active + (event.key === 'ArrowLeft' ? -1 : 1));
  });
  const track = document.querySelector('.pdp-related-track');
  const controls = document.querySelector('.pdp-related-controls');
  const previous = controls.querySelector('[data-related-step="-1"]');
  const next = controls.querySelector('[data-related-step="1"]');
  const update = () => {
    const end = track.scrollWidth - track.clientWidth;
    controls.hidden = end < 2;
    previous.disabled = track.scrollLeft < 2;
    next.disabled = track.scrollLeft >= end - 2;
  };
  controls.querySelectorAll('button').forEach(button => button.addEventListener('click', () => {
    const step = track.firstElementChild.getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap);
    track.scrollBy({left: Number(button.dataset.relatedStep) * step, behavior: matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'});
  }));
  track.addEventListener('scroll', update, {passive:true});
  new ResizeObserver(update).observe(track);
  update();
})();
