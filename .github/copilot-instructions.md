# AI Agent Instructions for Laravel Portfolio

This document guides AI agents in understanding and working with this Laravel portfolio codebase.

## Project Overview
A dual-purpose Laravel 12 application with:

### Public Area
- Interactive portfolio with Type and Technology filtering
- Project showcase with GitHub metrics display
- Splash page with light/dark theme toggle
- Bio offcanvas with accessibility features
- High-contrast badges and responsive design

### Admin Backoffice
- Full CRUD for Projects, Types, and Technologies
- GitHub repository import (CLI + UI)
  - Auto-categorization via topics/language
  - Metrics sync (stars/forks/watchers)
- Project visibility management (draft/published/featured)
- Display order customization
- Profile and bio management

## Key Architecture Points

### Stack Tecnologico
- PHP 8.2+ e Laravel 12
- MySQL (o SQLite in sviluppo)
- Vite + Bootstrap 5 + Sass per il frontend
- Breeze per l'autenticazione admin

### Data Model
- `Project`: Core entity with GitHub metadata, Type (1:1), and Technologies (N:M)
- Route model binding uses slugs (`getRouteKeyName()` returns 'slug')
- Projects have visibility states (`is_published`, `is_featured`) and ordering (`display_order`, `featured_order`)

### Project Sources
1. Manual creation via admin CRUD
2. GitHub import:
   - CLI: `php artisan portfolio:import-github {username} [options]`
   - Options: `--include-forks`, `--private`, `--topics=csv`, `--visibility=public|private|all`
   - Admin UI: POST to `admin/import-github`
   - Auto-maps GitHub topics to Technologies/Types using conventions
   - Stores GitHub metrics (stars, forks, watchers, last update)

#### GitHub Import Error Handling
- Rate limit management with GITHUB_TOKEN
- Fallback behavior on topic fetch failure
- Repository access validation
- Duplicate repository detection (updates existing)
- Invalid topic/language graceful degradation

### Key Files
```
app/
  Models/Project.php           # Core entity with GitHub metadata
  Console/Commands/
    ImportGithubProjects.php  # GitHub import logic
  Http/Controllers/
    Guest/ProjectsController.php  # Public portfolio routes
routes/
  web.php                     # All routes (guest/admin/profile)
resources/
  views/guest/*              # Public templates
  sass/app.scss              # Theme and UI components
```

## Development Workflow

### Environment Setup
```powershell
composer install
npm install
copy .env.example .env
php artisan key:generate
# Configure DB in .env (MySQL/SQLite)
# Optional: Add GITHUB_TOKEN=... for higher rate limits
php artisan migrate --seed
npm run build  # or npm run dev for watch mode
php artisan serve --host=127.0.0.1 --port=8010
```

### Testing
```powershell
php artisan test --no-coverage
```

### Key URLs & Routes
- Splash: `http://127.0.0.1:8010/` (rotta: `splash`)
- Portfolio: `http://127.0.0.1:8010/portfolio` (rotta: `home`)
- Project Details: `/projects/{project:slug}`
- Filters: `/portfolio/technology/{technology:slug}`, `/portfolio/type/{type:slug}`
- Admin: `http://127.0.0.1:8010/admin/*` (login required)
- Profile: `/profile`, `/bio` (login required)

## Conventions & Patterns

### Technology/Type Mapping from GitHub
1. Topics map directly: `frontend` → Frontend Type
2. Language + tech stack analysis for implicit mapping:
   - Frontend indicators: JS, Vue, React, HTML, CSS, etc.
   - Backend indicators: PHP, Laravel, Node.js, Express, DBs
   - Full-stack defaults to Backend type

### Project Ordering & Visibility
Priority cascade in `Project::scopeOrdered()`:
1. `display_order` (manual)
2. `updated_at_github` (from GitHub)
3. `updated_at`
4. `created_at`
5. `id`

Visibilità progetti:
- `is_published`: true per mostrare nel portfolio pubblico
- `is_featured`: true per progetti in evidenza (richiede published)
- Gli import da GitHub sono salvati come non pubblicati di default
- Model scope `published()` e `featured()` per il filtraggio

### URL/Slug Handling
- All public routes use slugs for SEO
- Automatic slug generation during GitHub import
- Collision handling: append incrementing number (e.g., project-2)

### Auth & Security
- Admin credentials in UserSeeder (email: `admin@portfolio.it`)
- Guest area is public, no auth required
- All admin routes under `/admin/*` prefix require authentication

## Integration Points
1. GitHub API:
   - Repository listing endpoint
   - Topics endpoint (separate call per repo)
   - Rate limiting handled with optional token
2. Frontend assets:
   - Vite for bundling
   - Bootstrap 5 + Icons
   - Light/dark theme support

## Quality & Maintenance Guidelines

### Testing & Validation
- Run full test suite before commits
- Validate project imports in development
- Check accessibility in both themes

### Code Conventions
- Follow GitHub import mapping conventions
- Use slug-based routing for all public URLs
- Maintain project ordering logic
- Preserve Type/Technology relationships

### Performance & Security
- Keep GitHub API rate limits in mind
- Follow authentication boundaries
- Optimize asset bundling with Vite
- Monitor database query performance