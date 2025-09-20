<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Portfolio')</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
<nav>
    <a href="{{ route('home') }}">Home</a>
    @auth
        <a href="{{ route('profile.show') }}">Profilo</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth
</nav>
<hr>
<div class="container">
    @yield('content')
</div>
</body>
</html>
