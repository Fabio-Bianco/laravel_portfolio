{{-- Se esiste un layout principale, decommenta la riga sotto e rimuovi <html>... --}}
{{-- @extends('layouts.app') --}}

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Portfolio — Splash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- ...existing code... (link ai CSS globali se necessario) --}}
    <style>
        /* Stile minimale; sostituisci con classi del tuo framework (es. Bootstrap/Tailwind) */
        body { margin:0; font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
        .wrap { min-height: 100dvh; display: grid; place-items: center; padding: 2rem; }
        .card { text-align: center; max-width: 700px; }
        .title { font-size: clamp(2rem, 5vw, 3rem); margin-bottom: .5rem; }
        .lead { color: #666; margin-bottom: 1.5rem; }
        .btn { display:inline-block; padding:.75rem 1.25rem; border-radius:.5rem; background:#0d6efd; color:#fff; text-decoration:none; }
        .btn:hover { filter: brightness(0.95); }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="card">
            <h1 class="title">Benvenuto nel mio Portfolio</h1>
            <p class="lead">Esplora i progetti e le ultime realizzazioni.</p>
            <a href="{{ url('/projects') }}" class="btn">Vai ai progetti</a>
        </section>
    </main>
</body>
</html>