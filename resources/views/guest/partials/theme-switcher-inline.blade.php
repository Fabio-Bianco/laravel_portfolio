{{-- Theme Switcher con Collapsible - Alpine.js Powered --}}
<div 
  x-data="{ 
    ...darkMode, 
    expanded: false 
  }" 
  class="theme-switcher-inline" 
  role="region" 
  aria-label="Cambia tema"
  x-cloak>
  
  {{-- Bottone principale mostra tema corrente --}}
  <button 
    @click="expanded = !expanded"
    class="theme-toggle-btn"
    :aria-expanded="expanded"
    aria-label="Cambia tema"
    type="button">
    
    {{-- Icona tema corrente --}}
    <svg x-show="isActive('light')" class="theme-icon-main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="4"/>
      <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
    </svg>
    
    <svg x-show="isActive('auto')" class="theme-icon-main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="10"/>
      <path d="M12 2a10 10 0 0 1 0 20z" fill="currentColor"/>
    </svg>
    
    <svg x-show="isActive('dark')" class="theme-icon-main" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
    </svg>
  </button>
  
  {{-- Menu espandibile con 3 opzioni --}}
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
    aria-label="Seleziona tema">
    
    {{-- Light --}}
    <button 
      @click="setTheme('light'); expanded = false" 
      class="theme-option"
      :class="{ 'active': isActive('light') }"
      :aria-checked="isActive('light')"
      aria-label="Tema chiaro"
      role="radio"
      type="button">
      <svg class="theme-icon-option" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="4"/>
        <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
      </svg>
      <span class="theme-label">Chiaro</span>
    </button>
    
    {{-- Auto --}}
    <button 
      @click="setTheme('auto'); expanded = false" 
      class="theme-option"
      :class="{ 'active': isActive('auto') }"
      :aria-checked="isActive('auto')"
      aria-label="Tema automatico"
      role="radio"
      type="button">
      <svg class="theme-icon-option" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/>
        <path d="M12 2a10 10 0 0 1 0 20z" fill="currentColor"/>
      </svg>
      <span class="theme-label">Auto</span>
    </button>
    
    {{-- Dark --}}
    <button 
      @click="setTheme('dark'); expanded = false" 
      class="theme-option"
      :class="{ 'active': isActive('dark') }"
      :aria-checked="isActive('dark')"
      aria-label="Tema scuro"
      role="radio"
      type="button">
      <svg class="theme-icon-option" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
      </svg>
      <span class="theme-label">Scuro</span>
    </button>
  </div>
</div>
