@extends('layouts.app')

@section('title', 'Galeri | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Galeri</span>
            <h1>Galeri Kegiatan dan Kenangan Candi Wetan</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="gallery-grid">
                @foreach ($galleryImages as $image)
                    <img src="{{ asset('images/galeri/' . $image['file']) }}" alt="{{ $image['alt'] }}" class="gallery-item">
                @endforeach
            </div>
        </div>
    </section>
@endsection
