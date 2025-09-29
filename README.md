## Laravel Portfolio – Backoffice + Guest Area

Un portfolio interattivo basato su Laravel 12, con backoffice amministrativo e sezione pubblica filtrabile per Tipo e Tecnologia. Integra import da GitHub, badge accessibili, tema chiaro/scuro e pagina splash.

- Demo locale (splash): http://127.0.0.1:8010/
- Rotta splash (nome): `splash` → `/`
- Vetrina progetti (home): `home` → `/portfolio`

---

## Funzionalità principali
- CRUD completo dei progetti (admin)
- Tassonomia con Type (Frontend/Backend/Automazioni) e Technology (N:M)
- Filtri ospite per Tipo e Tecnologia, con conteggi
- Import progetti da GitHub via CLI e UI admin (stars/forks/watchers, updated_at_github)
- Slug e route model binding per i dettagli progetto
- Pagina Splash pubblica con tema chiaro/scuro e transizione
- Bio Offcanvas, navbar “Work/Profilo”, badge ad alto contrasto

## Stack tecnico
- PHP 8.2+, Laravel 12
- MySQL (o SQLite in locale), Eloquent, Migrations/Seeders
- Vite, Bootstrap 5, Bootstrap Icons, Sass
- Breeze per l’autenticazione

## Requisiti
- PHP 8.2+, Composer
- Node.js 18+ e npm
- Database MySQL (consigliato) oppure SQLite
- Opzionale: `GITHUB_TOKEN` per import con rate limit più alto

## Setup rapido
1) Clona e installa dipendenze
```powershell
composer install
npm install
```

2) Configura l’ambiente
```powershell
copy .env.example .env
php artisan key:generate
```
- Imposta il DB in `.env` (MySQL o SQLite)
- Facoltativo: aggiungi `GITHUB_TOKEN=...` in `.env`

3) Migrazioni e seed
```powershell
php artisan migrate --seed
```

4) Compila asset
```powershell
npm run build
# oppure per sviluppo
npm run dev
```

5) Avvia il server
```powershell
php artisan serve --host=127.0.0.1 --port=8010
```
Apri: http://127.0.0.1:8010/

## Credenziali demo
- Admin
  - Email: `admin@portfolio.it`
  - Password: `Password123!`
- Guest: nessuna autenticazione richiesta

> Nota: il seeder `UserSeeder` garantisce la presenza dell’admin. La suite di test di autenticazione è verde.

## Import da GitHub
- Via CLI
```powershell
php artisan portfolio:import-github Fabio-Bianco --visibility=public --include-forks
```
Opzioni disponibili (estratto): `--include-forks`, `--private`, `--topics=csv`, `--visibility=public|private|all`.

- Via UI (admin)
  - POST `admin/import-github` da form dedicato nella dashboard admin
  - Mappa topics → Technology/Type; salva anche `stargazers_count`, `forks_count`, `watchers_count`, `updated_at_github`

## Rotte principali
- Splash (guest): `/` → `splash`
- Portfolio (home): `/portfolio` → `home`
- Filtri: `/portfolio/technology/{technology:slug}`, `/portfolio/type/{type:slug}`
- Dettaglio: `/projects/{project:slug}`
- Admin (protette): `/admin/*` (CRUD Projects/Technologies/Types, Import GitHub)
- Profilo (loggati): `/profile`, `/bio`

## Accessibilità e UX
- Badge Type/Technology con elevato contrasto (light/dark)
- Navbar con voci “Work” (portfolio) e “Profilo” (login/profile)
- Offcanvas Bio con tasti e focus management
- Ordinamento progetti per “recency” (GitHub update → updated_at → created_at)

## Splash page (cover)
- URL locale: http://127.0.0.1:8010/
- URL generico: `${APP_URL}/` (rotta `splash`)

Suggerimento: usa uno screenshot della splash come immagine di copertina della card del repository. Puoi salvarlo in `public/img/cover-splash.png` e referenziarlo nel README:
```markdown
![Cover Splash](/img/cover-splash.png)
```

## Struttura utile
- `routes/web.php` → rotte guest/admin/profilo
- `app/Console/Commands/ImportGithubProjects.php` → comando import GitHub
- `app/Http/Controllers/Guest/ProjectsController.php` → lista/filtri/dettaglio
- `app/Models/Project.php` → cast GitHub metadata e slug
- `resources/views/guest/*` → viste pubbliche
- `resources/sass/app.scss` → tema e componenti UI

## Test
Esegui l’intera suite:
```powershell
php artisan test --no-coverage
```

Tutti i test attesi sono verdi (autenticazione, profilo, routing di base).