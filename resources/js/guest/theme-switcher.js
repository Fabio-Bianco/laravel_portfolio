/**
 * Theme Switcher - Light/Dark Mode Toggle
 * Salva la preferenza in localStorage e applica il tema
 */

document.addEventListener('DOMContentLoaded', function() {
  const html = document.documentElement;
  const themeOptions = document.querySelectorAll('.theme-option');
  const THEME_KEY = 'portfolio-theme';
  
  // Recupera il tema salvato o usa 'dark' come default
  const getStoredTheme = () => localStorage.getItem(THEME_KEY) || 'dark';
  
  // Salva il tema nel localStorage
  const setStoredTheme = (theme) => localStorage.setItem(THEME_KEY, theme);
  
  // Applica il tema al documento
  const setTheme = (theme) => {
    html.setAttribute('data-bs-theme', theme);
    
    // Aggiorna lo stato dei pulsanti
    themeOptions.forEach(option => {
      const isActive = option.dataset.theme === theme;
      option.classList.toggle('active', isActive);
      option.setAttribute('aria-checked', isActive);
    });
    
    // Salva la preferenza
    setStoredTheme(theme);
    
    // Dispatcha evento custom per altre parti dell'app
    window.dispatchEvent(new CustomEvent('themechange', { 
      detail: { theme } 
    }));
  };
  
  // Inizializza con il tema salvato
  const currentTheme = getStoredTheme();
  setTheme(currentTheme);
  
  // Gestisci i click sui pulsanti
  themeOptions.forEach(option => {
    option.addEventListener('click', () => {
      const theme = option.dataset.theme;
      setTheme(theme);
      
      // Feedback visivo
      option.style.transform = 'scale(0.95)';
      setTimeout(() => {
        option.style.transform = '';
      }, 150);
    });
  });
  
  // Ascolta i cambiamenti di preferenza del sistema (opzionale)
  const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
  
  // Solo se l'utente non ha mai scelto manualmente
  if (!localStorage.getItem(THEME_KEY)) {
    mediaQuery.addEventListener('change', (e) => {
      const systemTheme = e.matches ? 'dark' : 'light';
      setTheme(systemTheme);
    });
  }
  
  console.log('🎨 Theme switcher initialized:', currentTheme);
});
