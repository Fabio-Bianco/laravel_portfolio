/**
 * Theme Switcher - Alpine.js Component
 * Gestisce auto/light/dark mode con localStorage e preferenze sistema
 */

import Alpine from 'alpinejs';

// 🌙 Dark Mode Toggle Component
Alpine.data('darkMode', () => ({
  theme: localStorage.getItem('portfolio-theme') || 'auto', // auto | light | dark
  
  init() {
    this.applyTheme();
    
    // Rileva cambio preferenza sistema
    window.matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', (e) => {
        if (this.theme === 'auto') {
          this.applyTheme();
        }
      });
    
    console.log('🎨 Alpine Theme Switcher initialized:', this.theme);
  },
  
  setTheme(newTheme) {
    this.theme = newTheme;
    localStorage.setItem('portfolio-theme', this.theme);
    this.applyTheme();
    
    // Dispatcha evento custom per altre parti dell'app
    window.dispatchEvent(new CustomEvent('themechange', { 
      detail: { theme: this.theme } 
    }));
  },
  
  isActive(themeName) {
    return this.theme === themeName;
  },
  
  applyTheme() {
    const html = document.documentElement;
    
    if (this.theme === 'auto') {
      // Rimuovi attributo per usare prefers-color-scheme
      html.removeAttribute('data-bs-theme');
    } else {
      // Forza il tema scelto
      html.setAttribute('data-bs-theme', this.theme);
    }
  },
  
  get label() {
    const labels = {
      'auto': 'Auto',
      'light': 'Chiaro',
      'dark': 'Scuro'
    };
    return labels[this.theme];
  },
  
  get icon() {
    const icons = {
      'auto': 'bi-circle-half',
      'light': 'bi-sun-fill',
      'dark': 'bi-moon-stars-fill'
    };
    return icons[this.theme];
  }
}));

// Alpine verrà avviato da bootstrap.js
