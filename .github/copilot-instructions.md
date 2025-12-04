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

===

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.2.12
- laravel/framework (LARAVEL) - v12
- laravel/prompts (PROMPTS) - v0
- laravel/breeze (BREEZE) - v2
- laravel/mcp (MCP) - v0
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- phpunit/phpunit (PHPUNIT) - v11
- alpinejs (ALPINEJS) - v3

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.


=== tests rules ===

## Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test` with a specific filename or filter.


=== laravel/core rules ===

## Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using the `list-artisan-commands` tool.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Database
- Always use proper Eloquent relationship methods with return type hints. Prefer relationship methods over raw queries or manual joins.
- Use Eloquent models and relationships before suggesting raw database queries
- Avoid `DB::`; prefer `Model::query()`. Generate code that leverages Laravel's ORM capabilities rather than bypassing them.
- Generate code that prevents N+1 query problems by using eager loading.
- Use Laravel's query builder for very complex database operations.

### Model Creation
- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `list-artisan-commands` to check the available options to `php artisan make:model`.

### APIs & Eloquent Resources
- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

### Controllers & Validation
- Always create Form Request classes for validation rather than inline validation in controllers. Include both validation rules and custom error messages.
- Check sibling Form Requests to see if the application uses array or string based validation rules.

### Queues
- Use queued jobs for time-consuming operations with the `ShouldQueue` interface.

### Authentication & Authorization
- Use Laravel's built-in authentication and authorization features (gates, policies, Sanctum, etc.).

### URL Generation
- When generating links to other pages, prefer named routes and the `route()` function.

### Configuration
- Use environment variables only in configuration files - never use the `env()` function directly outside of config files. Always use `config('app.name')`, not `env('APP_NAME')`.

### Testing
- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

### Vite Error
- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.


=== laravel/v12 rules ===

## Laravel 12

- Use the `search-docs` tool to get version specific documentation.
- This project upgraded from Laravel 10 without migrating to the new streamlined Laravel file structure.
- This is **perfectly fine** and recommended by Laravel. Follow the existing structure from Laravel 10. We do not to need migrate to the new Laravel structure unless the user explicitly requests that.

### Laravel 10 Structure
- Middleware typically lives in `app/Http/Middleware/` and service providers in `app/Providers/`.
- There is no `bootstrap/app.php` application configuration in a Laravel 10 structure:
    - Middleware registration happens in `app/Http/Kernel.php`
    - Exception handling is in `app/Exceptions/Handler.php`
    - Console commands and schedule register in `app/Console/Kernel.php`
    - Rate limits likely exist in `RouteServiceProvider` or `app/Http/Kernel.php`

### Database
- When modifying a column, the migration must include all of the attributes that were previously defined on the column. Otherwise, they will be dropped and lost.
- Laravel 11 allows limiting eagerly loaded records natively, without external packages: `$query->latest()->limit(10);`.

### Models
- Casts can and likely should be set in a `casts()` method on a model rather than the `$casts` property. Follow existing conventions from other models.


=== pint/core rules ===

## Laravel Pint Code Formatter

- You must run `vendor/bin/pint --dirty` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test`, simply run `vendor/bin/pint` to fix any formatting issues.


=== phpunit/core rules ===

## PHPUnit Core

- This application uses PHPUnit for testing. All tests must be written as PHPUnit classes. Use `php artisan make:test --phpunit {name}` to create a new test.
- If you see a test using "Pest", convert it to PHPUnit.
- Every time a test has been updated, run that singular test.
- When the tests relating to your feature are passing, ask the user if they would like to also run the entire test suite to make sure everything is still passing.
- Tests should test all of the happy paths, failure paths, and weird paths.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files, these are core to the application.

### Running Tests
- Run the minimal number of tests, using an appropriate filter, before finalizing.
- To run all tests: `php artisan test`.
- To run all tests in a file: `php artisan test tests/Feature/ExampleTest.php`.
- To filter on a particular test name: `php artisan test --filter=testName` (recommended after making a change to a related file).
</laravel-boost-guidelines>
