# Light Mode Implementation Guide

## Overview
Il portfolio ora supporta una **light mode automatica** basata sulle preferenze del browser dell'utente, con possibilità di override manuale tramite il theme switcher.

## Come Funziona

### 1. Light Mode di Default (Automatica)
```scss
:root {
  // Colori light mode chiari, eleganti e confortevoli
  --color-bg: #ffffff;
  --color-surface: #f8f9fa;
  --color-text: #212529;
  // ... altri colori
}
```

### 2. Dark Mode Automatica (Media Query)
```scss
@media (prefers-color-scheme: dark) {
  :root {
    // Colori dark mode soft e moderni
    --color-bg: #1a1d23;
    --color-surface: #22262e;
    --color-text: #e6edf3;
    // ... altri colori
  }
}
```

### 3. Override Manuale (Theme Switcher)
```scss
[data-bs-theme="light"] { /* light mode forzata */ }
[data-bs-theme="dark"] { /* dark mode forzata */ }
```

## Palette Colori

### Light Mode (Default)
- **Background**: `#ffffff` (bianco puro)
- **Surface**: `#f8f9fa` (grigio chiarissimo)
- **Text**: `#212529` (quasi nero)
- **Text Muted**: `#6c757d` (grigio medio)
- **Border**: `#dee2e6` (grigio chiaro)
- **Accent**: `#0d6efd` (blu Bootstrap)

### Dark Mode
- **Background**: `#1a1d23` (grigio scuro, non nero)
- **Surface**: `#22262e` (grigio scuro elevato)
- **Text**: `#e6edf3` (bianco soft)
- **Text Muted**: `#8b949e` (grigio chiaro)
- **Border**: `#30363d` (grigio medio-scuro)
- **Accent**: `#3b82f6` (blu più luminoso)

## Componenti Aggiornati

### 1. Cards
- Bordi più sottili in light mode (1px vs 2px)
- Shadow più delicate
- Hover states ottimizzati per entrambi i temi

### 2. Badges
- **Type Badges**: colori pastello in light, neon soft in dark
- **Tech Badges**: grigio neutro in light, blu trasparente in dark
- **Filter Badges**: con transizioni smooth

### 3. Navigation
- Background trasparente con blur in entrambi i temi
- Bordi e separatori adattivi

### 4. Shadows
- **Light Mode**: ombre molto delicate (opacity 0.06-0.12)
- **Dark Mode**: ombre più profonde (opacity 0.3-0.6)

## Come Testare

### Browser Developer Tools
1. Apri DevTools (F12)
2. Apri Command Palette (Ctrl+Shift+P / Cmd+Shift+P)
3. Cerca "Rendering"
4. Trova "Emulate CSS prefers-color-scheme"
5. Seleziona "light" o "dark"

### Oppure
Cambia le impostazioni del sistema operativo:
- **Windows**: Impostazioni → Personalizzazione → Colori → Tema
- **macOS**: Preferenze di Sistema → Generali → Aspetto
- **Linux**: Varia in base al DE

### Theme Switcher
Il pulsante theme switcher permette di forzare manualmente il tema, ignorando le preferenze del sistema.

## Best Practices

### ✅ Fare
- Usare le variabili CSS definite (`var(--color-*)`)
- Testare sempre in entrambi i temi
- Mantenere il contrasto WCAG AA (4.5:1 per testo normale)

### ❌ Evitare
- Colori hardcoded (`#ffffff`, `black`, etc.)
- Assunzioni sul tema corrente
- Transizioni troppo brusche tra temi

## File Modificati

1. **`resources/sass/guest/_portfolio-guest.scss`**
   - Definizione variabili CSS
   - Media query per dark mode automatica
   - Override manuali con `data-bs-theme`

2. **`resources/sass/guest/_guest-minimal.scss`**
   - Stili componenti ottimizzati
   - Hover states migliorati
   - Card e badge adattivi

3. **`resources/sass/app.scss`**
   - Badge custom per portfolio
   - Filtri e pills responsive ai temi
   - Utility classes

## Troubleshooting

### Il tema non cambia
- Verifica che il browser supporti `prefers-color-scheme`
- Controlla che il theme switcher JS sia caricato
- Ispeziona l'elemento `<html>` per l'attributo `data-bs-theme`

### Colori strani in un tema
- Controlla che tutti i colori usino variabili CSS
- Verifica override specifici con media query
- Usa DevTools per ispezionare le variabili CSS applicate

## Future Improvements

- [ ] Aggiungere smooth transition tra temi
- [ ] Salvare preferenza utente in localStorage
- [ ] Aggiungere più varianti di accent color
- [ ] Implementare reduced motion per accessibilità
