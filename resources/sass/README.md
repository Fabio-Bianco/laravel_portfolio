# Struttura SCSS - Laravel Portfolio

## 📁 Organizzazione File

```
resources/sass/
├── app.scss                        # Entry point principale
├── variables.scss                  # Variabili globali (se necessarie)
├── _bootstrap-overrides.scss      # Override Bootstrap
├── _footer-2025.scss              # Footer componente
├── _contact-modern.scss           # Contact form componente
│
├── guest/                          # ✨ Area Guest (Portfolio pubblico)
│   ├── _portfolio-guest.scss      # Variabili CSS + imports
│   ├── _guest-minimal.scss        # Tutti gli stili guest
│   └── _accessibility.scss        # WCAG 2.1 AA compliance
│
└── admin/                          # 🔒 Area Admin (Backoffice)
    └── _admin-sidebar.scss        # Sidebar e layout admin
```

## 🎨 Sistema di Temi (Light/Dark)

### Variabili CSS
Definite in `guest/_portfolio-guest.scss`:

**Dark Mode (default):**
- Background: `#0a0e1a`
- Surface: `#131824`
- Text: `#e2e8f0`

**Light Mode:**
- Background: `#ffffff` (bianco puro)
- Surface: `#f8fafc` (grigio chiarissimo)
- Text: `#1e293b`

### Theme Switcher
- **Componente:** `resources/views/guest/partials/theme-switcher.blade.php`
- **JavaScript:** `resources/js/guest/theme-switcher.js`
- **Persistenza:** localStorage (`portfolio-theme`)
- **Posizione:** Fixed bottom-right, sopra i contatti

### Come funziona
1. JavaScript applica `data-bs-theme="light|dark"` all'elemento `<html>`
2. CSS usa `[data-bs-theme="light"]` per override delle variabili
3. La scelta viene salvata in localStorage
4. Al caricamento, legge la preferenza salvata (default: dark)

## 🔧 Import Order

```scss
// app.scss
@use "bootstrap-overrides" as *;
@import "bootstrap/scss/bootstrap";
@import "bootstrap-icons/font/bootstrap-icons.css";
@import "guest/portfolio-guest";  // Include guest-minimal + accessibility
@import "admin/admin-sidebar";
@import "footer-2025";
@import "contact-modern";
```

## 📝 Regole di Sviluppo

### ✅ DO
- Usare SCSS per tutti i nuovi stili
- Mantenere separazione guest/admin
- Definire variabili CSS per temi in `_portfolio-guest.scss`
- Usare nesting SCSS per leggibilità
- Commentare sezioni complesse

### ❌ DON'T
- Non creare nuovi file CSS (solo SCSS)
- Non duplicare variabili CSS
- Non mescolare stili guest/admin
- Non usare `!important` se evitabile
- Non hardcodare colori (usare variabili CSS)

## 🚀 Build

```bash
# Development (watch mode)
npm run dev

# Production (minified)
npm run build

# Clear cache views
php artisan view:clear
```

## 🎯 Checklist Nuovi Stili

- [ ] File creato nella cartella corretta (guest/ o admin/)
- [ ] Nome file inizia con underscore (`_nome.scss`)
- [ ] Importato in `app.scss` o nel file parent appropriato
- [ ] Usa variabili CSS per colori/spacing
- [ ] Supporta entrambi i temi (light/dark)
- [ ] Testato con `npm run build`
- [ ] Responsive (mobile-first)

## 📦 File Vite

I file SCSS vengono compilati tramite `vite.config.js`:
- Solo `resources/sass/app.scss` è l'entry point
- Tutti gli altri file vengono importati da `app.scss`
- Non aggiungere altri file SCSS in `vite.config.js`

## 🔍 Debug

Se i CSS non si applicano:
1. `php artisan view:clear`
2. `npm run build`
3. Hard refresh browser (Ctrl+F5)
4. Verifica console browser per errori
5. Controlla che `data-bs-theme` sia applicato

---

Ultima modifica: 18 novembre 2025
