<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website profil Padukuhan Candi Wetan, Kalurahan Karangwuluh, Kapanewon Temon, Kabupaten Kulon Progo.">
    <title>@yield('title', 'Candi Wetan — Profil Padukuhan')</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a href="{{ route('home') }}" class="brand" aria-label="Beranda Candi Wetan">
                <span class="brand-mark">CW</span>
                <span class="brand-text">
                    <strong>Candi Wetan</strong>
                    <small>Karangwuluh, Temon, Kulon Progo</small>
                </span>
            </a>

            <button class="nav-toggle" type="button" aria-label="Buka menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="site-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
                <a href="{{ route('pemerintahan') }}" class="{{ request()->routeIs('pemerintahan') ? 'active' : '' }}">Pemerintahan</a>
                <a href="{{ route('statistik-kependudukan.index') }}" class="{{ request()->routeIs('statistik-kependudukan.*') ? 'active' : '' }}">Statistik</a>
                <a href="{{ route('potensi') }}" class="{{ request()->routeIs('potensi') ? 'active' : '' }}">Potensi Desa</a>
                <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3>Candi Wetan</h3>
                <p>Kalurahan Karangwuluh<br>
                Kapanewon Temon<br>
                Kabupaten Kulon Progo<br>
                Daerah Istimewa Yogyakarta</p>
            </div>
            <div>
                <h4>Menu</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('profil') }}">Profil</a></li>
                    <li><a href="{{ route('pemerintahan') }}">Pemerintahan</a></li>
                    <li><a href="{{ route('statistik-kependudukan.index') }}">Statistik</a></li>
                    <li><a href="{{ route('potensi') }}">Potensi</a></li>
                    <li><a href="{{ route('berita') }}">Berita</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri</a></li>
                    <li><a href="{{ route('kontak') }}">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4>Informasi</h4>
                <p>Padukuhan Candi Wetan<br>
                Kalurahan Karangwuluh<br>
                Kapanewon Temon, Kulon Progo</p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">© 2026 Candi Wetan. All Rights Reserved.</div>
        </div>
    </footer>
</body>
</html>
