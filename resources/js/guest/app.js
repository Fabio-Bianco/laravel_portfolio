/**
 * Guest Area Entry Point
 * Imports all guest-specific modules and features
 */

import '../bootstrap';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import './contact-validation';
import './footer-enhanced';
import './accessibility';

// Alpine.js - Inizializzazione componenti
window.Alpine = Alpine;

// Dark Mode Component - PRIMA di Alpine.start()
Alpine.data('darkMode', () => ({
  theme: localStorage.getItem('portfolio-theme') || 'auto',
  expanded: false,
  
  init() {
    this.applyTheme();
    
    window.matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', () => {
        if (this.theme === 'auto') {
          this.applyTheme();
        }
      });
    
    console.log('🎨 Theme Switcher initialized:', this.theme);
  },
  
  setTheme(newTheme) {
    this.theme = newTheme;
    localStorage.setItem('portfolio-theme', this.theme);
    this.applyTheme();
    console.log('🎨 Theme changed to:', newTheme);
  },
  
  isActive(themeName) {
    return this.theme === themeName;
  },
  
  applyTheme() {
    const html = document.documentElement;
    
    if (this.theme === 'auto') {
      html.removeAttribute('data-bs-theme');
    } else {
      html.setAttribute('data-bs-theme', this.theme);
    }
  }
}));

// Start Alpine
Alpine.start();

// Bio sidebar è caricato separatamente nel layout

// Import images
import.meta.glob([
    '../../img/**'
])

// Toggle per "Leggi di più" nelle card del portfolio (guest)
document.addEventListener('click', (e) => {
  const btn = e.target.closest('.read-more');
  if (!btn) return;
  e.preventDefault();
  const expanded = btn.getAttribute('aria-expanded') === 'true';
  const targetId = btn.getAttribute('aria-controls');
  const full = targetId ? document.getElementById(targetId) : null;
  const p = btn.closest('.card')?.querySelector('p.card-text');
  const short = p?.querySelector('.desc-short');
  if (!full || !short) return;

  if (expanded) {
    // collassa
    full.classList.add('d-none');
    short.classList.remove('d-none');
    btn.textContent = 'Leggi di più';
    btn.setAttribute('aria-expanded', 'false');
  } else {
    // espandi
    full.classList.remove('d-none');
    short.classList.add('d-none');
    btn.textContent = 'Mostra meno';
    btn.setAttribute('aria-expanded', 'true');
  }
});

// Nasconde il bottone "Leggi di più" se il testo non viene clippato
function initReadMoreButtons() {
  document.querySelectorAll('.card .read-more').forEach((btn) => {
    const p = btn.closest('.card')?.querySelector('p.card-text');
    const short = p?.querySelector('.desc-short');
    if (!short) return;
    // Misura se il testo supera l'altezza di 2 righe
    const lineHeight = parseFloat(getComputedStyle(short).lineHeight);
    const maxHeight = lineHeight * 2 - 1; // margine per arrotondamenti
    if (short.scrollHeight <= maxHeight) {
      // Non serve il bottone
      btn.classList.add('d-none');
    }
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initReadMoreButtons);
} else {
  initReadMoreButtons();
}

// Auto-dismiss degli alert dopo 30 secondi (configurabile via data-timeout)
function initAutoDismissAlerts() {
  document.querySelectorAll('.alert.auto-dismiss').forEach((el) => {
    const timeout = parseInt(el.getAttribute('data-timeout') || '30000', 10);
    if (!Number.isFinite(timeout) || timeout <= 0) return;
    setTimeout(() => {
      try {
        const bsAlert = bootstrap?.Alert ? bootstrap.Alert.getOrCreateInstance(el) : null;
        bsAlert ? bsAlert.close() : el.classList.add('d-none');
      } catch {
        el.classList.add('d-none');
      }
    }, timeout);
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initAutoDismissAlerts, { once: true });
} else {
  initAutoDismissAlerts();
}

// Modal conferma eliminazione progetti (area admin)
(function initDeleteProjectModal(){
  let pendingForm = null;
  const modalEl = document.getElementById('confirmDeleteModal');
  if (!modalEl) return; // non siamo nella pagina admin projects
  const modal = new bootstrap.Modal(modalEl);
  const titleEl = modalEl.querySelector('#deleteProjectName');
  const confirmBtn = modalEl.querySelector('#confirmDeleteBtn');

  document.addEventListener('submit', (e) => {
    const form = e.target.closest('form.js-project-delete');
    if (!form) return;
    e.preventDefault();
    pendingForm = form;
    const projectName = form.getAttribute('data-project-title') || 'questo progetto';
    if (titleEl) titleEl.textContent = projectName;
    modal.show();
  });

  confirmBtn?.addEventListener('click', () => {
    if (pendingForm) {
      pendingForm.submit();
      pendingForm = null;
      modal.hide();
    }
  });
})();

// SPLASH FEATURE DISABILITATA - Mantiene codice per futura riattivazione
// Splash -> Home: fade-in se arrivo dalla splash
// document.addEventListener('DOMContentLoaded', () => {
//   try {
//     if (sessionStorage.getItem('fromSplash') === '1') {
//       sessionStorage.removeItem('fromSplash');
//       const body = document.body;
//       body.style.opacity = '0';
//       body.style.transition = 'opacity .35s ease';
//       requestAnimationFrame(() => {
//         body.style.opacity = '1';
//       });
//     }
//   } catch (_) {}
// });

// Tooltip Bootstrap per elementi con data-bs-toggle="tooltip"
(function initBootstrapTooltips(){
  try {
    const els = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    els.forEach((el) => {
      try {
        bootstrap.Tooltip.getOrCreateInstance(el, { container: 'body' });
      } catch {}
    });
    // Re-init anche dopo navigazioni turbolenti (se usi inertia/turbolinks in futuro)
    document.addEventListener('shown.bs.modal', () => {
      els.forEach((el) => {
        try { bootstrap.Tooltip.getOrCreateInstance(el, { container: 'body' }); } catch {}
      });
    });
  } catch {}
})();

//# sourceMappingURL=app.js.map
