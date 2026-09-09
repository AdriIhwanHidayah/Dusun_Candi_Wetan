@extends('layouts.app')

@section('title', 'Potensi Wilayah | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Potensi Wilayah</span>
            <h1>Potensi dan Peluang Candi Wetan</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="card-grid three-up">
                @php
                    $items = [
                        ['title' => 'Pertanian', 'description' => 'Potensi pertanian dan aktivitas warga.', 'image' => asset('images/galeri/kegiatan panen cabe.jpg')],
                        ['title' => 'UMKM', 'description' => 'Usaha mikro, kecil, dan menengah warga padukuhan.', 'image' => asset('images/galeri/prokeran.jpg')],
                        ['title' => 'Peternakan', 'description' => 'Data akan diperbarui sesuai kondisi aktual wilayah.', 'image' => null, 'placeholder' => 'Peternakan'],
                        ['title' => 'Perikanan', 'description' => 'Data akan diperbarui sesuai kondisi aktual wilayah.', 'image' => null, 'placeholder' => 'Perikanan'],
                        ['title' => 'Seni dan Budaya', 'description' => 'Kegiatan kebudayaan dan kebersamaan warga.', 'image' => asset('images/galeri/17an.jpg')],
                        ['title' => 'Wisata', 'description' => 'Potensi wisata sekitar wilayah Candi Wetan.', 'image' => asset('images/candi-wetan-landscape.jpg')],
                        ['title' => 'Produk Lokal', 'description' => 'Hasil karya dan produk khas lokal Candi Wetan.', 'image' => asset('images/galeri/kkn VII B 2.jpg')],
                    ];
                @endphp

                @foreach ($items as $item)
                    <article class="info-card">
                        @if(!empty($item['image']))
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="width: 100%; height: 180px; object-fit: cover; border-top-left-radius: var(--radius-md); border-top-right-radius: var(--radius-md);">
                        @else
                            <div class="card-image placeholder-small">{{ $item['placeholder'] }}</div>
                        @endif
                        <div class="card-body">
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                            <a href="#" class="btn btn-ghost">Selengkapnya</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
