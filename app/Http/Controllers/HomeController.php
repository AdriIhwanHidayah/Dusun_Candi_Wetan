<?php

namespace App\Http\Controllers;

use App\Services\StatistikKependudukanService;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Halaman Beranda / Home
     */
    public function index(StatistikKependudukanService $statistikService)
    {
        try {
            // Ambil semua data statistik dari CSV
            $rows = $statistikService->all();

            // Total penduduk berdasarkan Jenis Kelamin
            $genderRows = $rows->where('kategori', 'Jenis Kelamin');

            $totalPenduduk = $genderRows->sum(function ($row) {
                return (int) $row->jumlah;
            });

            // Jumlah laki-laki
            $lakiLaki = $genderRows
                ->filter(function ($row) {
                    return in_array($row->subkategori, ['L', 'Laki-laki']);
                })
                ->sum(function ($row) {
                    return (int) $row->jumlah;
                });

            // Jumlah perempuan
            $perempuan = $genderRows
                ->filter(function ($row) {
                    return in_array($row->subkategori, ['P', 'Perempuan']);
                })
                ->sum(function ($row) {
                    return (int) $row->jumlah;
                });

            // Jumlah KK
            $jumlahKK = $rows
                ->filter(function ($row) {
                    return $row->kategori === 'Kepala Keluarga'
                        && $row->subkategori === 'Jumlah KK';
                })
                ->sum(function ($row) {
                    return (int) $row->jumlah;
                });

        } catch (\Throwable $e) {
            $totalPenduduk = 0;
            $lakiLaki = 0;
            $perempuan = 0;
            $jumlahKK = 0;
        }

        // Ambil maksimal 6 gambar untuk halaman beranda
        $galleryImages = array_slice($this->galleryImages(), 0, 6);

        return view('home', compact(
            'totalPenduduk',
            'lakiLaki',
            'perempuan',
            'jumlahKK',
            'galleryImages'
        ));
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

    /**
     * Mengambil gambar dari folder public/images/galeri
     */
    private function galleryImages(): array
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

        return collect(File::files(public_path('images/galeri')))
            ->filter(function ($file) use ($allowedExtensions) {
                return in_array(
                    strtolower($file->getExtension()),
                    $allowedExtensions,
                    true
                );
            })
            ->sortBy(function ($file) {
                return strtolower($file->getFilename());
            })
            ->map(function ($file) {
                $name = pathinfo(
                    $file->getFilename(),
                    PATHINFO_FILENAME
                );

                return [
                    'file' => $file->getFilename(),
                    'alt' => ucwords(
                        str_replace(['-', '_'], ' ', $name)
                    ),
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