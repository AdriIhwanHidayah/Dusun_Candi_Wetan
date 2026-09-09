@extends('layouts.app')

@section('title', 'Berita | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Berita</span>
            <h1>Informasi dan Kegiatan Masyarakat</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="card-grid three-up">
                @php
                    $news = [
                        [
                            'title' => 'Gotong Royong & Kerja Bakti Warga', 
                            'excerpt' => 'Semangat kebersamaan warga Padukuhan Candi Wetan dalam melaksanakan kerja bakti pembersihan fasilitas umum, pemakaman, dan penataan lingkungan secara berkala.', 
                            'badge' => 'Gotong Royong'
                        ],
                        [
                            'title' => 'Potensi Pertanian & Rencana Wisata', 
                            'excerpt' => 'Optimasi potensi utama padukuhan di sektor pertanian produktif serta perencanaan strategi pembangunan kawasan wisata lokal yang berkelanjutan.', 
                            'badge' => 'Potensi Wilayah'
                        ],
                        [
                            'title' => 'Aktivitas Pertanian Komoditas Lokal', 
                            'excerpt' => 'Geliat aktivitas masyarakat Candi Wetan dalam mengelola lahan pertanian agraris dengan komoditas unggulan seperti jagung, padi, cabai, dan sayuran.', 
                            'badge' => 'Kegiatan Warga'
                        ],
                    ];
                @endphp

                @foreach ($news as $item)
                    <article class="news-card">
                        <span class="news-badge">{{ $item['badge'] }}</span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['excerpt'] }}</p>
                        <a href="#" class="text-link">Selengkapnya</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
