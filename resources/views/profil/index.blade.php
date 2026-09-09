@extends('layouts.app')

@section('title', 'Profil | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Profil</span>
            <h1>Profil Padukuhan Candi Wetan</h1>
        </div>
    </section>

    <section class="section">
        <div class="container two-column">
            <div class="feature-image">
                <img src="{{ asset('images/candi-wetan-landscape.jpg') }}" alt="Profil Candi Wetan" style="width: 100%; height: 100%; object-fit: cover; border-radius: var(--radius-lg);">
            </div>
            <div class="feature-copy">
                <span class="section-tag">Sekilas Candi Wetan</span>
                <h2>Jejak Mataram Kuno hingga Kawasan Strategis YIA.</h2>
                <p>Padukuhan Candi Wetan, terletak di Kalurahan Karangwuluh, Kapanewon Temon, menyimpan jejak sejarah yang kaya. Nama "Candi" merujuk pada temuan artefak Yoni peninggalan era Mataram Kuno, menandakan wilayah ini pernah menjadi lokasi tempat suci pada masa lampau.</p>
                <p>Kini, wilayah yang dahulu merupakan tanah agraris subur (Adikarta) di bawah naungan Kadipaten Pakualaman ini terus bertransformasi. Berada strategis di dekat Bandara Internasional Yogyakarta (YIA), Candi Wetan berkembang menjadi kawasan penyangga modern yang memadukan warisan sejarah dan kemajuan infrastruktur.</p>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading">
                <span class="section-tag">Sejarah</span>
                <h2>Sejarah Candi Wetan</h2>
            </div>
            <div class="story-layout">
                <div class="story-image">
                    <img src="{{ asset('images/galeri/tirakatan.jpg') }}" alt="Sejarah Candi Wetan" style="width: 100%; height: 100%; object-fit: cover; border-radius: var(--radius-lg);">
                </div>
                <div class="story-copy">
                    <h3>Asal-Usul Nama & Jejak Arkeologi</h3>
                    <p>Meskipun saat ini tidak terlihat kompleks bangunan candi utuh, penamaan "Candi Wetan" memiliki dasar historis yang kuat. Berdasarkan pendataan Balai Pelestarian Kebudayaan (BKB), di kawasan Dusun Candi (yang membawahi Candi Wetan dan Candi Kulon) ditemukan benda cagar budaya berupa Yoni kuno berbahan batu andesit.</p>
                    <p>Temuan ini mengonfirmasi bahwa pada era Mataram Kuno, wilayah ini pernah menjadi tempat pemujaan atau lokasi tempat suci (candi). Setelah bangunan candinya runtuh seiring waktu, masyarakat menamai kawasan tersebut dusun "Candi", yang kemudian terbagi menjadi Candi Wetan dan Candi Kulon.</p>
                    
                    <h3>Bagian dari Kadipaten Pakualaman</h3>
                    <p>Secara historis, Candi Wetan berada di bawah naungan Kabupaten Adikarta (tanah palungguh milik Kadipaten Pakualaman) sebelum digabung menjadi Kabupaten Kulon Progo pada tahun 1951. Dahulu, kawasan pesisir ini dikeringkan atas perintah Sri Paduka Paku Alam V untuk dijadikan lahan persawahan agraris yang sangat subur (Adikarta).</p>
                    
                    <h3>Kondisi dan Perkembangan Terkini</h3>
                    <p>Kini, letak Padukuhan Candi Wetan menjadi sangat strategis karena kedekatannya dengan Bandara YIA. Wilayah yang dulunya didominasi agraris tradisional ini perlahan bertransformasi menjadi kawasan penunjang aktivitas bandara, dengan diiringi modernisasi dan pembangunan infrastruktur publik secara berkala.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading left">
                <span class="section-tag">Visi & Misi</span>
                <h2>Visi & Misi Sementara</h2>
                <small class="subtle-note">VISI & MISI SEMENTARA — dapat diperbarui berdasarkan dokumen resmi padukuhan.</small>
            </div>
            <div class="vision-box">
                <h3>VISI</h3>
                <p>"Mewujudkan Candi Wetan yang maju, mandiri, sejahtera, guyub, dan berkelanjutan berlandaskan semangat gotong royong."</p>
            </div>
            <div class="mission-list">
                <h3>MISI</h3>
                <ol>
                    <li>Meningkatkan kualitas pelayanan kepada masyarakat.</li>
                    <li>Mendorong pengembangan potensi ekonomi masyarakat.</li>
                    <li>Meningkatkan kepedulian terhadap lingkungan.</li>
                    <li>Mendorong kegiatan sosial, pendidikan, seni, dan budaya masyarakat.</li>
                    <li>Memperkuat semangat gotong royong dan kebersamaan masyarakat.</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading">
                <span class="section-tag">Wilayah</span>
                <h2>Kondisi Wilayah</h2>
            </div>
            <div class="info-grid four-up">
                <div class="mini-card">
                    <span>Letak wilayah</span>
                    <strong>Padukuhan Candi Wetan</strong>
                </div>
                <div class="mini-card">
                    <span>Jumlah RT</span>
                    <strong>4</strong>
                </div>
                <div class="mini-card">
                    <span>Jumlah RW</span>
                    <strong>2</strong>
                </div>
                <div class="mini-card">
                    <span>Luas wilayah</span>
                    <strong>Pekarangan: 10,8 hektar<br>
                        Sawah: 23,76 hektar<br>
                        Total: 33,84 hektar</strong>
                </div>
            </div>

            <div class="detail-list">
                <div class="detail-item">
                    <span>Padukuhan</span>
                    <strong>Candi Wetan</strong>
                </div>
                <div class="detail-item">
                    <span>Kalurahan</span>
                    <strong>Karangwuluh</strong>
                </div>
                <div class="detail-item">
                    <span>Kapanewon</span>
                    <strong>Temon</strong>
                </div>
                <div class="detail-item">
                    <span>Kabupaten</span>
                    <strong>Kulon Progo</strong>
                </div>
                <div class="detail-item">
                    <span>Provinsi</span>
                    <strong>Daerah Istimewa Yogyakarta</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Lokasi</span>
                <h2>Peta & Lokasi Candi Wetan</h2>
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
