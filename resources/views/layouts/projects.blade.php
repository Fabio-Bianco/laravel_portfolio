<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projects')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container" style="max-width:900px; margin:2rem auto;">
        <h1>@yield('title', 'Projects')</h1>

        @yield('content')

    </div>
</body>
</html>