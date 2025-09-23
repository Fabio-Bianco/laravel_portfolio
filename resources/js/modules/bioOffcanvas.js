import { Offcanvas } from 'bootstrap';

export function initBioOffcanvas() {
  const btn = document.getElementById('openBioOffcanvasBtn');
  const el = document.getElementById('bioOffcanvas');
  if (!btn || !el) return;

  const off = Offcanvas.getOrCreateInstance(el, {
    backdrop: false,
    keyboard: false,
    scroll: true,
  });

  const toggle = () => {
    if (el.classList.contains('show')) off.hide();
    else off.show();
  };

  btn.addEventListener('click', toggle);
  el.addEventListener('shown.bs.offcanvas', () => document.body.classList.add('drawer-left-open'));
  el.addEventListener('hidden.bs.offcanvas', () => document.body.classList.remove('drawer-left-open'));
}

// Auto-init
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initBioOffcanvas);
} else {
  initBioOffcanvas();
}
