@extends('layouts.app')

@section('title', 'Candi Wetan — Profil Padukuhan')

@section('content')
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-inner">
            <div class="hero-copy">
                <span class="eyebrow">Padukuhan Candi Wetan</span>
                <h1>Selamat Datang di Candi Wetan</h1>
                <p>Padukuhan Candi Wetan, Kalurahan Karangwuluh, Kapanewon Temon, Kabupaten Kulon Progo</p>
                <div class="hero-actions">
                    <a href="{{ route('profil') }}" class="btn btn-primary">Jelajahi Candi Wetan</a>
                    <a href="{{ route('statistik-kependudukan.index') }}" class="btn btn-secondary">Lihat Statistik</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-label">Total Penduduk</span>
                    <strong>{{ $totalPenduduk ?? 0 }}</strong>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Laki-laki</span>
                    <strong>{{ $lakiLaki ?? 0 }}</strong>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Perempuan</span>
                    <strong>{{ $perempuan ?? 0 }}</strong>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Jumlah KK</span>
                    <strong>{{ $jumlahKK ?? 0 }}</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container two-column">
            <div class="feature-image">
                <img src="{{ asset('images/candi-wetan-landscape.jpg') }}" alt="Pemandangan Candi Wetan" style="width: 100%; height: 100%; object-fit: cover; border-radius: var(--radius-lg);">
            </div>
            <div class="feature-copy">
                <span class="section-tag">Sekilas Candi Wetan</span>
                <h2>Jejak Mataram Kuno hingga Kawasan Strategis YIA.</h2>
                <p>Padukuhan Candi Wetan, terletak di Kalurahan Karangwuluh, Kapanewon Temon, menyimpan jejak sejarah yang kaya. Nama "Candi" merujuk pada temuan artefak Yoni peninggalan era Mataram Kuno, menandakan wilayah ini pernah menjadi lokasi tempat suci pada masa lampau.</p>
                <p>Kini, wilayah yang dahulu merupakan tanah agraris subur (Adikarta) di bawah naungan Kadipaten Pakualaman ini terus bertransformasi. Berada strategis di dekat Bandara Internasional Yogyakarta (YIA), Candi Wetan berkembang menjadi kawasan penyangga modern yang memadukan warisan sejarah dan kemajuan infrastruktur.</p>
                <a href="{{ route('profil') }}" class="text-link">Baca lebih lanjut</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Potensi Wilayah</span>
                <h2>Potensi yang terus dikembangkan</h2>
            </div>
            <div class="card-grid three-up">
                <article class="info-card">
                    <div class="card-image placeholder-small">Potensi</div>
                    <div class="card-body">
                        <h3>Pertanian</h3>
                        <p>Data akan diperbarui sesuai kondisi aktual wilayah.</p>
                        <a href="{{ route('potensi') }}" class="btn btn-ghost">Selengkapnya</a>
                    </div>
                </article>
                <article class="info-card">
                    <div class="card-image placeholder-small">UMKM</div>
                    <div class="card-body">
                        <h3>UMKM</h3>
                        <p>Data akan diperbarui sesuai kondisi aktual wilayah.</p>
                        <a href="{{ route('potensi') }}" class="btn btn-ghost">Selengkapnya</a>
                    </div>
                </article>
                <article class="info-card">
                    <div class="card-image placeholder-small">Wisata</div>
                    <div class="card-body">
                        <h3>Wisata</h3>
                        <p>Data akan diperbarui sesuai kondisi aktual wilayah.</p>
                        <a href="{{ route('potensi') }}" class="btn btn-ghost">Selengkapnya</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Berita</span>
                <h2>Informasi terkini</h2>
            </div>
            <div class="card-grid three-up">
                <article class="news-card">
                    <span class="news-badge">Gotong Royong</span>
                    <h3>Gotong Royong & Kerja Bakti Warga</h3>
                    <p>Semangat kebersamaan warga Padukuhan Candi Wetan dalam melaksanakan kerja bakti pembersihan fasilitas umum, pemakaman, dan penataan lingkungan secara berkala.</p>
                    <a href="{{ route('berita') }}" class="text-link">Lihat berita</a>
                </article>
                <article class="news-card">
                    <span class="news-badge">Potensi Wilayah</span>
                    <h3>Potensi Pertanian & Rencana Wisata</h3>
                    <p>Optimasi potensi utama padukuhan di sektor pertanian produktif serta perencanaan strategi pembangunan kawasan wisata lokal yang berkelanjutan.</p>
                    <a href="{{ route('berita') }}" class="text-link">Lihat berita</a>
                </article>
                <article class="news-card">
                    <span class="news-badge">Kegiatan Warga</span>
                    <h3>Aktivitas Pertanian Komoditas Lokal</h3>
                    <p>Geliat aktivitas masyarakat Candi Wetan dalam mengelola lahan pertanian agraris dengan komoditas unggulan seperti jagung, padi, cabai, dan sayuran.</p>
                    <a href="{{ route('berita') }}" class="text-link">Lihat berita</a>
                </article>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Galeri</span>
                <h2>Moment dan kegiatan Candi Wetan</h2>
                <p class="section-intro">Potret kebersamaan dan kegiatan warga Candi Wetan.</p>
            </div>
            <div class="gallery-grid gallery-grid--preview">
                @foreach ($galleryImages as $image)
                    <img src="{{ asset('images/galeri/' . $image['file']) }}" alt="{{ $image['alt'] }}" class="gallery-item">
                @endforeach
            </div>
            <div class="gallery-action">
                <a href="{{ route('galeri') }}" class="btn btn-ghost">Lihat semua momen <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Lokasi</span>
                <h2>Peta Wilayah Candi Wetan</h2>
            </div>
            <div style="max-width: 900px; margin: 0 auto;">
                <div class="map-container" style="position: relative; overflow: hidden; border-radius: var(--radius-lg, 16px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border: 1px solid rgba(0,0,0,0.06);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15810.12!2d110.0531549!3d-7.8727861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7ae422717d4965%3A0x32fee96e9b1990e9!2sCandi%20Wetan%2C%20Karangwuluh%2C%20Kec.%20Temon%2C%20Kabupaten%20Kulon%20Progo%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid" 
                        width="100%" 
                        height="450" 
                        style="border:0; display: block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div style="margin-top: 1.25rem; text-align: center;">
                    <a href="https://maps.app.goo.gl/WTWKkUH4T6Rivxir9" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        📍 Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
