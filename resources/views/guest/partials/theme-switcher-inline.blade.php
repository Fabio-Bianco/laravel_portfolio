{{-- Theme Switcher Inline per Navbar - Alpine.js Powered --}}
<div 
  x-data="darkMode" 
  class="theme-switcher-inline" 
  role="region" 
  aria-label="Cambia tema"
  x-cloak>
  
  {{-- Container 3 bottoncini inline --}}
  <div class="theme-buttons-inline" role="radiogroup" aria-label="Seleziona tema">
    
    {{-- Bottone Auto --}}
    <button 
      @click="setTheme('auto')" 
      class="theme-btn-inline"
      :class="{ 'active': isActive('auto') }"
      :aria-checked="isActive('auto')"
      aria-label="Tema automatico"
      title="Automatico"
      role="radio"
      type="button">
      <svg class="theme-icon-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="5"/>
        <path d="M12 1v6m0 6v6m5.66-13.66L13.5 9.5m-3 3l-4.16 4.16M23 12h-6m-6 0H1m17.66 5.66L13.5 13.5m-3-3l-4.16-4.16"/>
      </svg>
    </button>
    
    {{-- Bottone Light --}}
    <button 
      @click="setTheme('light')" 
      class="theme-btn-inline"
      :class="{ 'active': isActive('light') }"
      :aria-checked="isActive('light')"
      aria-label="Tema chiaro"
      title="Chiaro"
      role="radio"
      type="button">
      <svg class="theme-icon-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="4"/>
        <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
      </svg>
    </button>
    
    {{-- Bottone Dark --}}
    <button 
      @click="setTheme('dark')" 
      class="theme-btn-inline"
      :class="{ 'active': isActive('dark') }"
      :aria-checked="isActive('dark')"
      aria-label="Tema scuro"
      title="Scuro"
      role="radio"
      type="button">
      <svg class="theme-icon-inline" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
      </svg>
    </button>
  </div>
</div>
