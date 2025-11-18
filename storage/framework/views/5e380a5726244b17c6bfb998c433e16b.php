
<div 
  class="theme-switcher-inline" 
  x-data="{ mode: localStorage.getItem('theme') || 'auto', expanded: false, setTheme(value) { this.mode = value; localStorage.setItem('theme', value); if (value === 'auto') { document.documentElement.setAttribute('data-bs-theme', window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'); } else { document.documentElement.setAttribute('data-bs-theme', value); } }, isActive(value) { return this.mode === value; } }"
  x-init="setTheme(mode)"
  role="region" 
  aria-label="Cambia tema"
>
  
  
  <button 
    @click.prevent="expanded = !expanded"
    class="theme-toggle-btn"
    :aria-expanded="expanded"
    aria-label="Cambia tema"
    type="button"
  >
    
    <svg x-show="isActive('auto')" class="theme-icon-main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="5"/>
      <path d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
      <path d="M12 7a5 5 0 0 1 0 10" fill="currentColor" opacity="0.3"/>
    </svg>
    
    
    <svg x-show="isActive('light')" class="theme-icon-main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="5"/>
      <line x1="12" y1="1" x2="12" y2="3"/>
      <line x1="12" y1="21" x2="12" y2="23"/>
      <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
      <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
      <line x1="1" y1="12" x2="3" y2="12"/>
      <line x1="21" y1="12" x2="23" y2="12"/>
      <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
      <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
    </svg>
    
    
    <svg x-show="isActive('dark')" class="theme-icon-main" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
    </svg>
  </button>
  
  
  <div 
    x-show="expanded"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    @click.away="expanded = false"
    class="theme-options-menu"
    role="radiogroup"
    aria-label="Seleziona tema"
  >
    
    <button 
      @click.prevent="setTheme('auto'); expanded = false"
      class="theme-option"
      :class="{ 'active': isActive('auto') }"
      :aria-checked="isActive('auto')"
      aria-label="Tema automatico"
      role="radio"
      type="button"
    >
      <svg class="theme-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="5"/>
        <path d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
        <path d="M12 7a5 5 0 0 1 0 10" fill="currentColor" opacity="0.3"/>
      </svg>
      <span class="theme-label">Automatico</span>
    </button>
    
    
    <button 
      @click.prevent="setTheme('light'); expanded = false"
      class="theme-option"
      :class="{ 'active': isActive('light') }"
      :aria-checked="isActive('light')"
      aria-label="Tema chiaro"
      role="radio"
      type="button"
    >
      <svg class="theme-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="5"/>
        <line x1="12" y1="1" x2="12" y2="3"/>
        <line x1="12" y1="21" x2="12" y2="23"/>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
        <line x1="1" y1="12" x2="3" y2="12"/>
        <line x1="21" y1="12" x2="23" y2="12"/>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
      </svg>
      <span class="theme-label">Chiaro</span>
    </button>
    
    
    <button 
      @click.prevent="setTheme('dark'); expanded = false"
      class="theme-option"
      :class="{ 'active': isActive('dark') }"
      :aria-checked="isActive('dark')"
      aria-label="Tema scuro"
      role="radio"
      type="button"
    >
      <svg class="theme-icon" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
      </svg>
      <span class="theme-label">Scuro</span>
    </button>
  </div>
</div>
<?php /**PATH C:\Users\Utente\Desktop\my_project\laravel_portfolio\resources\views/guest/partials/theme-switcher-inline.blade.php ENDPATH**/ ?>