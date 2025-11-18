# 🎨 Alpine.js Theme Switcher - Guida Completa

## 🌟 Cos'è Alpine.js?

**Alpine.js** è un framework JavaScript minimalista (solo 15KB) che porta **reattività** simile a Vue.js direttamente nell'HTML.

### Perché Alpine.js?

| Caratteristica | Alpine.js | Vanilla JS | Vue.js/React |
|----------------|-----------|------------|--------------|
| **Dimensione** | ~15KB | 0KB | ~100KB+ |
| **Complessità** | Bassa | Bassa | Alta |
| **Reattività** | ✅ | ❌ | ✅ |
| **Setup** | Minimo | Nessuno | Build step |
| **Curva apprendimento** | Facile | Facile | Media/Alta |

### Sintassi Base Alpine.js

```html
<!-- x-data: definisce scope reattivo -->
<div x-data="{ open: false }">
  
  <!-- @click: gestore eventi -->
  <button @click="open = !open">Toggle</button>
  
  <!-- x-show: visibilità condizionale -->
  <div x-show="open">
    Contenuto nascondibile
  </div>
  
  <!-- x-text: inserisce testo reattivo -->
  <p x-text="open ? 'Aperto' : 'Chiuso'"></p>
</div>
```

---

## 🚀 Implementazione nel Portfolio

### 1. Installazione

```bash
npm install alpinejs
```

### 2. Struttura File

```
resources/
├── js/
│   ├── bootstrap.js              # Alpine importato globalmente
│   └── guest/
│       └── theme-switcher.js     # Componente Alpine darkMode
└── views/
    └── guest/
        └── partials/
            └── theme-switcher.blade.php  # Template con direttive Alpine
```

---

## 🎯 Il Componente `darkMode`

### File: `resources/js/guest/theme-switcher.js`

```javascript
import Alpine from 'alpinejs';

Alpine.data('darkMode', () => ({
  // 💾 Stato: recupera da localStorage o default 'auto'
  theme: localStorage.getItem('portfolio-theme') || 'auto',
  
  // 🏁 Inizializzazione
  init() {
    this.applyTheme();
    
    // 👂 Ascolta cambio preferenze sistema
    window.matchMedia('(prefers-color-scheme: dark)')
      .addEventListener('change', (e) => {
        if (this.theme === 'auto') {
          this.applyTheme();
        }
      });
  },
  
  // 🔄 Toggle tra auto → light → dark → auto
  toggle() {
    const themes = ['auto', 'light', 'dark'];
    const currentIndex = themes.indexOf(this.theme);
    this.theme = themes[(currentIndex + 1) % themes.length];
    
    localStorage.setItem('portfolio-theme', this.theme);
    this.applyTheme();
  },
  
  // 🎨 Applica tema al DOM
  applyTheme() {
    const html = document.documentElement;
    
    if (this.theme === 'auto') {
      // Rimuovi attributo → usa @media prefers-color-scheme
      html.removeAttribute('data-bs-theme');
    } else {
      // Forza tema light o dark
      html.setAttribute('data-bs-theme', this.theme);
    }
  },
  
  // 🏷️ Label leggibile
  get label() {
    return {
      'auto': 'Auto',
      'light': 'Chiaro',
      'dark': 'Scuro'
    }[this.theme];
  },
  
  // 🎭 Icona Bootstrap Icons
  get icon() {
    return {
      'auto': 'bi-circle-half',
      'light': 'bi-sun-fill',
      'dark': 'bi-moon-stars-fill'
    }[this.theme];
  }
}));
```

---

## 🖼️ Template Blade con Alpine

### File: `resources/views/guest/partials/theme-switcher.blade.php`

```html
<div 
  x-data="darkMode"           <!-- Inizializza componente -->
  class="theme-switcher" 
  x-cloak>                    <!-- Nasconde prima che Alpine sia pronto -->
  
  <!-- Pulsante principale -->
  <button 
    @click="toggle()"         <!-- Chiama metodo toggle() -->
    x-ref="button"            <!-- Referenza DOM per JS -->
    class="theme-switcher-btn"
    :aria-label="'Tema: ' + label"    <!-- Bind dinamico -->
    :title="'Tema: ' + label">
    
    <!-- Icona dinamica -->
    <i :class="icon" class="theme-icon"></i>
    
    <!-- Label (solo desktop) -->
    <span class="theme-label" x-text="label"></span>
  </button>
  
  <!-- Indicatore stato -->
  <div class="theme-indicator">
    <small x-text="'Tema: ' + label"></small>
  </div>
</div>

<style>
  /* Nasconde elementi prima che Alpine sia pronto */
  [x-cloak] { display: none !important; }
</style>
```

---

## 🎨 Direttive Alpine.js Usate

| Direttiva | Cosa Fa | Esempio |
|-----------|---------|---------|
| `x-data` | Definisce scope reattivo | `x-data="darkMode"` |
| `x-cloak` | Nasconde prima di Alpine ready | `<div x-cloak>` |
| `@click` | Event listener onClick | `@click="toggle()"` |
| `x-ref` | Riferimento DOM | `x-ref="button"` |
| `:class` | Bind dinamico class | `:class="icon"` |
| `x-text` | Inserisce testo reattivo | `x-text="label"` |
| `:aria-label` | Bind accessibilità | `:aria-label="'...'` |

---

## 🔧 Come Funziona il Sistema

### Flusso di Funzionamento

```
1. Alpine.start()
   ↓
2. Alpine trova x-data="darkMode"
   ↓
3. Inizializza componente con init()
   ↓
4. Legge localStorage ('auto' | 'light' | 'dark')
   ↓
5. Applica tema:
   - auto → rimuove data-bs-theme (usa prefers-color-scheme)
   - light/dark → setta data-bs-theme="light|dark"
   ↓
6. CSS variabili si aggiornano automaticamente
   ↓
7. Click button → toggle() → salva + applica
```

### Stati del Tema

```scss
// ⚙️ AUTO MODE (default)
:root {
  // Light mode di base
}

@media (prefers-color-scheme: dark) {
  :root {
    // Dark mode automatico
  }
}

// 🔆 LIGHT MODE (forzato)
[data-bs-theme="light"] {
  // Light mode esplicito
}

// 🌙 DARK MODE (forzato)
[data-bs-theme="dark"] {
  // Dark mode esplicito
}
```

---

## 📱 Responsive Design

### Desktop
- Pulsante circolare 56x56px
- Hover → espande label
- Indicatore stato visibile

### Mobile
- Pulsante 48x48px
- Label sempre nascosta
- Indicatore nascosto
- Posizione: bottom-right 1rem

---

## 🎭 Stili CSS

### Pulsante Base

```scss
.theme-switcher-btn {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: var(--color-surface);
  border: 2px solid var(--color-border);
  box-shadow: var(--shadow-lg);
  
  &:hover {
    background: var(--color-accent);
    color: white;
    transform: translateY(-4px) scale(1.05);
    box-shadow: var(--shadow-xl), var(--shadow-glow);
  }
}
```

### Animazioni

- **Hover**: scale + translateY
- **Click**: scale(0.95) per feedback
- **Icon rotate**: 20deg su hover

---

## 🧪 Testing

### 1. Testa Auto Mode
```javascript
// Console DevTools
localStorage.removeItem('portfolio-theme');
location.reload();
// Cambia tema OS → dovrebbe aggiornarsi
```

### 2. Testa Light/Dark Manuale
```javascript
// Click sul pulsante 3 volte
// Dovrebbe ciclare: auto → light → dark → auto
```

### 3. Verifica localStorage
```javascript
// Console
localStorage.getItem('portfolio-theme');
// Output: "auto" | "light" | "dark"
```

---

## 🔍 Debugging Alpine.js

### DevTools

1. **Apri Console**
2. **Ispeziona elemento con x-data**
3. **Accedi ai dati Alpine**:

```javascript
// Trova elemento Alpine
const el = document.querySelector('[x-data="darkMode"]');

// Accedi ai dati del componente
Alpine.$data(el); // { theme: 'auto', ... }

// Chiama metodi
Alpine.$data(el).toggle();
```

### Alpine DevTools Extension

- [Chrome/Edge](https://chrome.google.com/webstore/detail/alpine-devtools/fopaemeedckajflibkpifppcankfmbhk)
- [Firefox](https://addons.mozilla.org/en-US/firefox/addon/alpine-js-devtools/)

---

## 🚀 Vantaggi del Nostro Sistema

### ✅ Rispetto al Vanilla JS

| Feature | Vanilla JS | Alpine.js |
|---------|-----------|-----------|
| Codice HTML | Pulito ma statico | Reattivo inline |
| Gestione stato | Manuale | Automatica |
| Event listeners | `addEventListener()` | `@click` |
| DOM updates | `querySelector()` + set | Automatici |
| Manutenibilità | Media | Alta |

### ✅ Vantaggi Specifici

1. **Reattività**: label e icon si aggiornano automaticamente
2. **Dichiarativo**: logica visibile nell'HTML
3. **Meno codice**: no `querySelector()`, no `addEventListener()`
4. **Auto-sync**: localStorage ↔ DOM ↔ UI sempre sincronizzati
5. **Leggibile**: chiunque capisce cosa fa `x-text="label"`

---

## 📚 Risorse Alpine.js

- **Documentazione**: https://alpinejs.dev
- **Playground**: https://alpinejs.dev/playground
- **Esempi**: https://alpinejs.dev/examples
- **GitHub**: https://github.com/alpinejs/alpine

---

## 🎯 Prossimi Step

### Possibili Estensioni

```javascript
// 1. Transizioni smooth
Alpine.data('darkMode', () => ({
  // ... codice esistente
  
  toggleWithTransition() {
    document.documentElement.classList.add('theme-transitioning');
    this.toggle();
    setTimeout(() => {
      document.documentElement.classList.remove('theme-transitioning');
    }, 300);
  }
}));

// 2. Shortcut tastiera
Alpine.data('darkMode', () => ({
  // ... codice esistente
  
  init() {
    // ... init esistente
    
    // Cmd/Ctrl + K per toggle
    document.addEventListener('keydown', (e) => {
      if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        this.toggle();
      }
    });
  }
}));

// 3. Dropdown menu invece di toggle ciclico
// Template:
<div x-data="darkMode" class="dropdown">
  <button @click="showMenu = !showMenu">
    <i :class="icon"></i>
  </button>
  
  <div x-show="showMenu" x-cloak>
    <button @click="setTheme('auto')">Auto</button>
    <button @click="setTheme('light')">Chiaro</button>
    <button @click="setTheme('dark')">Scuro</button>
  </div>
</div>
```

---

## 🐛 Troubleshooting

### Alpine non inizializza

```javascript
// Verifica che sia importato
console.log(window.Alpine); // Deve esistere

// Verifica che sia avviato
console.log(Alpine.version); // Es: "3.13.3"
```

### Tema non si applica

```javascript
// Verifica localStorage
console.log(localStorage.getItem('portfolio-theme'));

// Verifica data-bs-theme
console.log(document.documentElement.getAttribute('data-bs-theme'));

// Forza applicazione
Alpine.$data(document.querySelector('[x-data="darkMode"]')).applyTheme();
```

### x-cloak ancora visibile

```css
/* Assicurati che questo CSS sia caricato PRIMA del DOM */
[x-cloak] { display: none !important; }
```

---

## 📊 Confronto Finale

### Prima (Vanilla JS)
```javascript
// 60+ righe di codice
document.addEventListener('DOMContentLoaded', function() {
  const html = document.documentElement;
  const options = document.querySelectorAll('.theme-option');
  // ... altro codice manuale
});
```

### Dopo (Alpine.js)
```html
<!-- Tutto dichiarativo e reattivo -->
<div x-data="darkMode">
  <button @click="toggle()" :aria-label="label">
    <i :class="icon"></i>
    <span x-text="label"></span>
  </button>
</div>
```

**Risultato**: Codice più pulito, manutenibile e potente! 🎉
