<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\StatistikKependudukan;

class StatistikKependudukanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $selectedCategories = array_values(array_filter(
                (array) $request->input('kategori', []),
                fn ($category) => is_string($category) && $category !== ''
            ));

            $query = $this->filteredQuery($request, $selectedCategories);

            $data = $query->orderBy('dusun')
                ->orderBy('kategori')
                ->get();

            $summary = [
                'total_penduduk' => (clone $query)->where('kategori', 'Jenis Kelamin')->sum('jumlah'),
                'jenis_kelamin' => $this->countDistinctSubcategories($query, 'Jenis Kelamin'),
                'keagamaan' => $this->countDistinctSubcategories($query, 'Keagamaan'),
                'pekerjaan' => $this->countDistinctSubcategories($query, 'Pekerjaan'),
                'pendidikan' => $this->countDistinctSubcategories($query, 'Pendidikan'),
                'kepala_keluarga' => (clone $query)->where('kategori', 'Kepala Keluarga')->sum('jumlah'),
            ];

            $options = [];

            foreach (['dusun', 'rw', 'rt', 'tahun', 'kategori'] as $column) {
                $options[$column] = StatistikKependudukan::query()
                    ->whereNotNull($column)
                    ->where($column, '!=', '')
                    ->distinct()
                    ->orderBy($column)
                    ->pluck($column);
            }
        } catch (\Throwable $e) {
            $data = collect();
            $summary = array_fill_keys([
                'total_penduduk',
                'jenis_kelamin',
                'keagamaan',
                'pekerjaan',
                'pendidikan',
                'kepala_keluarga',
            ], 0);
            $options = array_fill_keys(['dusun', 'rw', 'rt', 'tahun', 'kategori'], collect());
            $selectedCategories = [];
        }

        return view('statistik-kependudukan.index', compact('data', 'options', 'selectedCategories', 'summary'));
    }

    private function filteredQuery(Request $request, array $selectedCategories): Builder
    {
        $query = StatistikKependudukan::query();

        foreach (['dusun', 'rw', 'rt', 'tahun'] as $filter) {
            if ($request->filled($filter)) {
                $query->where($filter, $request->input($filter));
            }
        }

        if ($selectedCategories !== []) {
            $query->whereIn('kategori', $selectedCategories);
        }

        return $query;
    }

    private function countDistinctSubcategories(Builder $query, string $category): int
    {
        return (int) (clone $query)
            ->where('kategori', $category)
            ->selectRaw('COUNT(DISTINCT subkategori) as total')
            ->value('total');
    }

    public function create()
    {
        return view('statistik-kependudukan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dusun' => 'required|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'subkategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        StatistikKependudukan::create($validated);

        return redirect()
            ->route('statistik-kependudukan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = StatistikKependudukan::findOrFail($id);

        return view('statistik-kependudukan.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = StatistikKependudukan::findOrFail($id);

        return view('statistik-kependudukan.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = StatistikKependudukan::findOrFail($id);

        $validated = $request->validate([
            'dusun' => 'required|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'tahun' => 'required|integer',
            'kategori' => 'required|string|max:255',
            'subkategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        $data->update($validated);

        return redirect()
            ->route('statistik-kependudukan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $data = StatistikKependudukan::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('statistik-kependudukan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}