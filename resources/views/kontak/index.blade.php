@extends('layouts.app')

@section('title', 'Kontak | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Kontak</span>
            <h1>Hubungi Padukuhan Candi Wetan</h1>
        </div>
    </section>

    <section class="section">
        <div class="container contact-grid">
            <div class="contact-card">
                <h3>Padukuhan Candi Wetan</h3>
                <ul class="contact-list">
                    <li><strong>Nama:</strong> Padukuhan Candi Wetan</li>
                    <li><strong>Alamat:</strong> Candi Wetan, Kalurahan Karangwuluh, Kapanewon Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta</li>
                    <li><strong>Nomor telepon:</strong> [AKAN DIISI]</li>
                    <li><strong>Email:</strong> [AKAN DIISI]</li>
                    <li><strong>Media sosial:</strong> [AKAN DIISI]</li>
                </ul>
            </div>
            <div class="contact-map">
                <div class="map-container" style="position: relative; overflow: hidden; border-radius: var(--radius-lg, 16px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border: 1px solid rgba(0,0,0,0.06);">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15810.12!2d110.0531549!3d-7.8727861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7ae422717d4965%3A0x32fee96e9b1990e9!2sCandi%20Wetan%2C%20Karangwuluh%2C%20Kec.%20Temon%2C%20Kabupaten%20Kulon%20Progo%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0; display: block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div style="margin-top: 1rem;">
                    <a href="https://maps.app.goo.gl/WTWKkUH4T6Rivxir9" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="width: 100%; text-align: center; display: block;">
                        📍 Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
