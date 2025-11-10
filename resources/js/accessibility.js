/**
 * Accessibility Enhancements
 * Gestisce le funzionalità di accessibilità del sito
 */

// Toggle Alto Contrasto
function toggleHighContrast(event) {
  event.preventDefault();
  document.body.classList.toggle('high-contrast');
  
  // Salva la preferenza
  const isHighContrast = document.body.classList.contains('high-contrast');
  localStorage.setItem('highContrast', isHighContrast);
  
  // Aggiorna l'aria-label
  const button = event.currentTarget;
  button.setAttribute('aria-label', 
    isHighContrast ? 'Disattiva modalità alto contrasto' : 'Attiva modalità alto contrasto'
  );
}

// Gestione della riduzione del movimento
function handleReduceMotion() {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  document.documentElement.classList.toggle('reduce-motion', prefersReducedMotion);
}

// Gestore font-size
function adjustFontSize(direction) {
  const root = document.documentElement;
  const currentSize = parseFloat(getComputedStyle(root).fontSize);
  const newSize = direction === 'increase' ? currentSize * 1.1 : currentSize * 0.9;
  
  root.style.fontSize = `${newSize}px`;
  localStorage.setItem('fontSize', newSize);
}

// Keyboard Navigation Enhancement
function handleKeyboardNavigation(event) {
  if (event.key === 'Tab') {
    document.body.classList.add('keyboard-user');
  }
}

// Initialize Accessibility Features
document.addEventListener('DOMContentLoaded', function() {
  // Ripristina le preferenze salvate
  const savedContrast = localStorage.getItem('highContrast');
  if (savedContrast === 'true') {
    document.body.classList.add('high-contrast');
  }
  
  const savedFontSize = localStorage.getItem('fontSize');
  if (savedFontSize) {
    document.documentElement.style.fontSize = `${savedFontSize}px`;
  }
  
  // Event Listeners
  window.matchMedia('(prefers-reduced-motion: reduce)').addListener(handleReduceMotion);
  document.addEventListener('keydown', handleKeyboardNavigation);
  
  // Inizializza stato iniziale
  handleReduceMotion();
  
  // Aggiungi controlli dimensione testo
  const controls = `
    <div class="text-size-controls" role="group" aria-label="Controlli dimensione testo">
      <button onclick="adjustFontSize('decrease')" aria-label="Riduci dimensione testo">A-</button>
      <button onclick="adjustFontSize('increase')" aria-label="Aumenta dimensione testo">A+</button>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', controls);
});

// Announcer per screen reader
class Announcer {
  constructor() {
    this.element = document.createElement('div');
    this.element.setAttribute('aria-live', 'polite');
    this.element.setAttribute('aria-atomic', 'true');
    this.element.classList.add('sr-only');
    document.body.appendChild(this.element);
  }

  announce(message) {
    this.element.textContent = message;
  }
}

// Inizializza l'announcer globale
window.announcer = new Announcer();