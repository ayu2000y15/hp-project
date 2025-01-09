<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pastel Live') - Vtuber事務所</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<style>
    body {
        background-image: url(storage/img/hp/back3.png);
        background-repeat: no-repeat;
        background-position: 50% 40px;
        background-size: cover;
    }
</style>
<body>
    <header>
        <div class="header-content">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/pastel-live-logo.png') }}" alt="Pastel Live">
            </a>

            <nav>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">HOME</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">ABOUT</a></li>
                    <li><a href="{{ route('talent') }}" class="{{ request()->routeIs('talent') || request()->routeIs('talent.show')  ? 'active' : '' }}">TALENT</a></li>
                    <li><a href="{{ route('news') }}" class="{{ request()->routeIs('news') ? 'active' : '' }}">NEWS</a></li>
                    <li><a href="{{ route('audition') }}" class="{{ request()->routeIs('audition') ? 'active' : '' }}">AUDITION</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">CONTACT</a></li>
                </ul>
            </nav>

            <a href="#" class="official-shop-button">OFFICIAL SHOP</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Pastel Live. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

