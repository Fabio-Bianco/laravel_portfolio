# Commit Messages - Dark Mode Implementation

Usa questi commit messages (conventional commits) per organizzare il lavoro:

## 1. Design Tokens
```bash
git add resources/sass/_tokens.scss
git commit -m "feat(theme): add CSS design tokens for light/dark mode

- Define color palette with AA/AAA contrast ratios
- Light mode: muted grays, vibrant primary blue
- Dark mode: deep blacks, luminous accents
- Include transition durations and easing tokens"
```

## 2. Bootstrap Overrides
```bash
git add resources/sass/_bootstrap-overrides.scss
git commit -m "feat(theme): add Bootstrap variable overrides

- Map Bootstrap variables to CSS custom properties
- Provide fallback values for compatibility
- Configure component styles (cards, forms, buttons)
- Set responsive grid and spacing"
```

## 3. Dark Mode Styles
```bash
git add resources/sass/_dark.scss
git commit -m "feat(theme): implement dark mode component styles

- Scope all styles to [data-theme='dark']
- Override Bootstrap components for dark theme
- Ensure focus states and ARIA compliance
- Maintain AA contrast for all text/background pairs"
```

## 4. SCSS Architecture
```bash
git add resources/sass/app.scss
git commit -m "refactor(scss): restructure main stylesheet

- Import design tokens before Bootstrap
- Add smooth transitions for theme switching
- Clean up legacy theme-dark class references
- Consolidate badge and utility styles"
```

## 5. Theme JavaScript
```bash
git add resources/js/theme.js vite.config.js
git commit -m "feat(theme): implement theme management system

- Support light, dark, and auto (system) modes
- Persist preference in localStorage
- Sync with prefers-color-scheme media query
- Update ARIA attributes for accessibility
- Zero-flash inline script in layout"
```

## 6. Layout Updates
```bash
git add resources/views/layouts/app.blade.php
git commit -m "refactor(layout): integrate theme system and remove navbar toggle

- Add anti-flash inline script in head
- Import theme.js via Vite
- Remove navbar theme toggle (footer-only now)
- Set data-theme attribute on <html>"
```

## 7. Footer Toggle
```bash
git add resources/views/partials/footer.blade.php
git commit -m "refactor(footer): consolidate theme toggle

- Update toggle ID to 'theme-toggle'
- Add ARIA attributes (aria-pressed, aria-label)
- Remove legacy toggle markup
- Accessible button with SVG icons"
```

## 8. Cleanup Legacy Code
```bash
git add resources/js/app.js resources/js/footer-enhanced.js
git commit -m "refactor(js): remove legacy theme toggle code

- Delete duplicate theme logic from app.js
- Remove footer-enhanced.js theme sync code
- All theme management now in theme.js"
```

## 9. Documentation
```bash
git add DARK_MODE_README.md
git commit -m "docs(theme): add comprehensive dark mode guide

- Architecture overview and file structure
- Setup and build instructions
- Accessibility testing checklist
- Troubleshooting common issues
- Future enhancement suggestions"
```

## 10. All-in-one (if preferred)
```bash
git add resources/sass/*.scss resources/js/theme.js resources/views/ vite.config.js DARK_MODE_README.md
git commit -m "feat(theme): implement complete dark mode system

BREAKING CHANGE: Theme toggle moved from navbar to footer only

Features:
- CSS design tokens with AA/AAA contrast
- Light/dark modes + system preference sync
- Zero-flash theme application
- Smooth transitions (150ms)
- Full Bootstrap component coverage
- Accessible ARIA attributes
- localStorage persistence

Files:
- Add: _tokens.scss, _bootstrap-overrides.scss, _dark.scss, theme.js
- Modify: app.scss, app.blade.php, footer.blade.php
- Remove: navbar toggle, legacy theme code
- Docs: DARK_MODE_README.md

Tested in: Chrome, Firefox, Safari, Edge (desktop + mobile)"
```

---

## After Committing

```bash
# Test build
npm run build

# Start dev server
php artisan serve --host=127.0.0.1 --port=8010

# Open browser and test
# - Theme toggle functionality
# - localStorage persistence
# - System preference sync
# - Component rendering in both themes
# - Accessibility (keyboard nav, screen reader)
```

---

## Optional: Conventional Commit Types

- `feat`: New feature
- `fix`: Bug fix
- `refactor`: Code restructure (no feature change)
- `style`: Formatting, no code change
- `docs`: Documentation only
- `test`: Adding/updating tests
- `chore`: Build process, dependencies
- `perf`: Performance improvement
