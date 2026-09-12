<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\StatistikKependudukan;
use App\Services\StatistikKependudukanService;

class StatistikKependudukanController extends Controller
{
    public function index(Request $request, StatistikKependudukanService $statistikService)
    {
        try {
            $selectedCategories = array_values(array_filter(
                (array) $request->input('kategori', []),
                fn ($category) => is_string($category) && $category !== ''
            ));
            $rows = $statistikService->all();

            $data = $this->filteredRows(
                $rows,
                $request,
                $selectedCategories
            );

            $summary = [
                'total_penduduk' => $this->sumCategory($data, 'Jenis Kelamin'),
                'jenis_kelamin' => $this->countDistinctSubcategories($data, 'Jenis Kelamin'),
                'keagamaan' => $this->countDistinctSubcategories($data, 'Keagamaan'),
                'pekerjaan' => $this->countDistinctSubcategories($data, 'Pekerjaan'),
                'pendidikan' => $this->countDistinctSubcategories($data, 'Pendidikan'),
                'kepala_keluarga' => $this->sumCategory($data, 'Kepala Keluarga'),
            ];

            $options = [];

            foreach (['dusun', 'rw', 'rt', 'tahun', 'kategori'] as $column) {
                $options[$column] = $rows
                    ->pluck($column)
                    ->filter(fn ($value) => $value !== null && $value !== '')
                    ->unique()
                    ->sort()
                    ->values();
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

    private function filteredRows(Collection $rows, Request $request, array $selectedCategories): Collection
    {
        $filtered = $rows->filter(function ($row) use ($request) {
            foreach (['dusun', 'rw', 'rt', 'tahun'] as $filter) {
                if ($request->filled($filter) && (string) $row->{$filter} !== (string) $request->input($filter)) {
                    return false;
                }
            }

            return true;
        });

        if ($selectedCategories !== []) {
            $filtered = $filtered->whereIn('kategori', $selectedCategories);
        }

        return $filtered
            ->sortBy([
                ['dusun', 'asc'],
                ['kategori', 'asc'],
            ])
            ->values();
    }

    private function sumCategory(Collection $rows, string $category): int
    {
        return (int) $rows
            ->where('kategori', $category)
            ->sum(fn ($row) => (int) $row->jumlah);
    }

    private function countDistinctSubcategories(Collection $rows, string $category): int
    {
        return $rows
            ->where('kategori', $category)
            ->pluck('subkategori')
            ->unique()
            ->count();
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