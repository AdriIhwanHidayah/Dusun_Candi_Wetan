<?php

namespace App\Http\Controllers;

use App\Models\StatistikKependudukan;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Halaman Beranda / Home
     */
    public function index()
    {
        try {
            $genderRows = StatistikKependudukan::where('kategori', 'Jenis Kelamin');
            $totalPenduduk = $genderRows->sum('jumlah');
            $lakiLaki = (clone $genderRows)
                ->whereIn('subkategori', ['L', 'Laki-laki'])
                ->sum('jumlah');
            $perempuan = (clone $genderRows)
                ->whereIn('subkategori', ['P', 'Perempuan'])
                ->sum('jumlah');

            $jumlahKK = StatistikKependudukan::where('kategori', 'Kepala Keluarga')
                ->where('subkategori', 'Jumlah KK')
                ->sum('jumlah');
        } catch (\Throwable $e) {
            $totalPenduduk = 0;
            $lakiLaki = 0;
            $perempuan = 0;
            $jumlahKK = 0;
        }

        $galleryImages = array_slice($this->galleryImages(), 0, 6);

        return view('home', compact('totalPenduduk', 'lakiLaki', 'perempuan', 'jumlahKK', 'galleryImages'));
    }

    /**
     * Halaman Profil
     */
    public function profil()
    {
        return view('profil.index');
    }

    /**
     * Halaman Pemerintahan
     */
    public function pemerintahan()
    {
        return view('pemerintahan.index');
    }

    /**
     * Halaman Potensi Wilayah
     */
    public function potensi()
    {
        return view('potensi.index');
    }

    /**
     * Halaman Berita
     */
    public function berita()
    {
        return view('berita.index');
    }

    /**
     * Halaman Galeri
     */
    public function galeri()
    {
        return view('galeri.index', [
            'galleryImages' => $this->galleryImages(),
        ]);
    }

    private function galleryImages(): array
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        return collect(File::files(public_path('images/galeri')))
            ->filter(function ($file) use ($allowedExtensions) {
                return in_array(strtolower($file->getExtension()), $allowedExtensions, true);
            })
            ->sortBy(function ($file) {
                return strtolower($file->getFilename());
            })
            ->map(function ($file) {
                $name = pathinfo($file->getFilename(), PATHINFO_FILENAME);

                return [
                    'file' => $file->getFilename(),
                    'alt' => ucwords(str_replace(['-', '_'], ' ', $name)),
                ];
            })
            ->values()
            ->all();
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('kontak.index');
    }
}
