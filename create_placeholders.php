<?php
/**
 * Script untuk membuat placeholder images
 * 
 * Jalankan dari root project:
 *   php create_placeholders.php
 * 
 * Setelah selesai, ganti file di public/images/ dengan foto asli.
 */

$dir = __DIR__ . '/public/images';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
    echo "Direktori $dir dibuat.\n";
}

$images = [
    'hero.jpg'            => [1920, 800, 'HERO IMAGE',    'Ganti dengan foto utama Candi Wetan (1920x800)'],
    'sejarah.jpg'         => [1200, 700, 'SEJARAH',       'Ganti dengan foto sejarah (1200x700)'],
    'profil.jpg'          => [800,  600, 'PROFIL',        'Ganti dengan foto profil Candi Wetan (800x600)'],
    'potensi-1.jpg'       => [800,  600, 'PERTANIAN',     'Foto potensi pertanian'],
    'potensi-2.jpg'       => [800,  600, 'UMKM',          'Foto potensi UMKM'],
    'potensi-3.jpg'       => [800,  600, 'PETERNAKAN',    'Foto potensi peternakan'],
    'potensi-4.jpg'       => [800,  600, 'PERIKANAN',     'Foto potensi perikanan'],
    'potensi-5.jpg'       => [800,  600, 'SENI & BUDAYA', 'Foto seni dan budaya'],
    'potensi-6.jpg'       => [800,  600, 'WISATA',        'Foto potensi wisata'],
    'potensi-7.jpg'       => [800,  600, 'PRODUK LOKAL',  'Foto produk lokal'],
    'galeri-1.jpg'        => [800,  600, 'GALERI 1',      'Ganti dengan foto galeri'],
    'galeri-2.jpg'        => [800,  600, 'GALERI 2',      'Ganti dengan foto galeri'],
    'galeri-3.jpg'        => [800,  600, 'GALERI 3',      'Ganti dengan foto galeri'],
    'galeri-4.jpg'        => [800,  600, 'GALERI 4',      'Ganti dengan foto galeri'],
    'galeri-5.jpg'        => [800,  600, 'GALERI 5',      'Ganti dengan foto galeri'],
    'galeri-6.jpg'        => [800,  600, 'GALERI 6',      'Ganti dengan foto galeri'],
    'pemerintahan-1.jpg'  => [400,  400, 'DUKUH',         'Foto Kepala Dukuh'],
    'pemerintahan-2.jpg'  => [400,  400, 'KETUA RT',      'Foto Ketua RT'],
    'pemerintahan-3.jpg'  => [400,  400, 'KETUA RW',      'Foto Ketua RW'],
    'pemerintahan-4.jpg'  => [400,  400, 'TOKOH',         'Foto Tokoh Masyarakat'],
    'berita-1.jpg'        => [800,  600, 'BERITA 1',      'Foto berita gotong royong'],
    'berita-2.jpg'        => [800,  600, 'BERITA 2',      'Foto potensi masyarakat'],
    'berita-3.jpg'        => [800,  600, 'BERITA 3',      'Foto kegiatan masyarakat'],
];

echo "Membuat " . count($images) . " placeholder images...\n\n";

foreach ($images as $filename => [$w, $h, $label, $desc]) {
    $path = $dir . '/' . $filename;

    $img = imagecreatetruecolor($w, $h);

    // Background gradient (simulated)
    for ($y = 0; $y < $h; $y++) {
        $ratio = $y / max($h, 1);
        $r = (int)(20 + $ratio * 18);
        $g = (int)(83 - $ratio * 25);
        $b = (int)(45 + $ratio * 12);
        $color = imagecolorallocate($img, min($r, 255), max($g, 0), min($b, 255));
        imageline($img, 0, $y, $w, $y, $color);
    }

    $gold    = imagecolorallocate($img, 201, 162, 39);
    $white   = imagecolorallocate($img, 255, 255, 255);
    $dimmed  = imagecolorallocate($img, 180, 180, 180);

    // Decorative border
    imagerectangle($img, 15, 15, $w - 16, $h - 16, $gold);

    // Cross lines (subtle)
    $lineColor = imagecolorallocatealpha($img, 201, 162, 39, 110);
    imageline($img, 0, 0, $w, $h, $lineColor);
    imageline($img, $w, 0, 0, $h, $lineColor);

    // Label
    $fontSize = 5;
    $charW = imagefontwidth($fontSize);
    $charH = imagefontheight($fontSize);
    $textW = strlen($label) * $charW;
    $x = (int)(($w - $textW) / 2);
    $y = (int)($h / 2 - $charH - 8);
    imagestring($img, $fontSize, $x, $y, $label, $gold);

    // Dimensions
    $dimText = $w . ' x ' . $h . ' px';
    $dimW = strlen($dimText) * $charW;
    $x2 = (int)(($w - $dimW) / 2);
    imagestring($img, $fontSize, $x2, $y + $charH + 4, $dimText, $white);

    // Description
    $descFont = 2;
    $descCharW = imagefontwidth($descFont);
    $descW = strlen($desc) * $descCharW;
    $x3 = (int)(($w - $descW) / 2);
    if ($x3 < 20) $x3 = 20;
    imagestring($img, $descFont, $x3, $y + $charH * 2 + 18, $desc, $dimmed);

    imagejpeg($img, $path, 82);
    imagedestroy($img);

    echo "  [OK] $filename ($w x $h)\n";
}

echo "\n======================================\n";
echo "Selesai! " . count($images) . " placeholder images dibuat.\n";
echo "Lokasi: $dir\n";
echo "Ganti file ini dengan foto asli Candi Wetan.\n";
echo "======================================\n";
