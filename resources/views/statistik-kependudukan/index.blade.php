@extends('layouts.app')

@section('title', 'Statistik Kependudukan | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Statistik</span>
            <h1>Statistik Kependudukan</h1>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">
            <form method="GET" action="{{ route('statistik-kependudukan.index') }}" class="filter-panel">
                <div class="filter-grid">
                    <label class="filter-field">
                        <span>Dusun</span>
                        <select name="dusun">
                            <option value="">Semua dusun</option>
                            @foreach ($options['dusun'] as $dusun)
                                <option value="{{ $dusun }}" @selected(request('dusun') === $dusun)>{{ $dusun }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="filter-field">
                        <span>RW</span>
                        <select name="rw">
                            <option value="">Semua RW</option>
                            @foreach ($options['rw'] as $rw)
                                <option value="{{ $rw }}" @selected(request('rw') === $rw)>{{ $rw }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="filter-field">
                        <span>RT</span>
                        <select name="rt">
                            <option value="">Semua RT</option>
                            @foreach ($options['rt'] as $rt)
                                <option value="{{ $rt }}" @selected(request('rt') === $rt)>{{ $rt }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="filter-field">
                        <span>Tahun</span>
                        <select name="tahun">
                            <option value="">Semua tahun</option>
                            @foreach ($options['tahun'] as $tahun)
                                <option value="{{ $tahun }}" @selected((string) request('tahun') === (string) $tahun)>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <fieldset class="category-filter">
                    <legend>Kategori</legend>
                    <div class="category-options">
                        @foreach ($options['kategori'] as $kategori)
                            <label class="category-option">
                                <input type="checkbox" name="kategori[]" value="{{ $kategori }}" @checked(in_array($kategori, $selectedCategories, true))>
                                <span>{{ $kategori }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <div class="filter-actions">
                    <button type="submit" class="button button-primary">Tampilkan data</button>
                    <a href="{{ route('statistik-kependudukan.index') }}" class="button button-secondary">Reset filter</a>
                </div>
            </form>

            <div class="summary-panel">
                <h2>Ringkasan Data</h2>
                <div class="stats-grid compact">
                    <div class="stat-card">
                        <span class="stat-label">Total Penduduk</span>
                        <strong>{{ $summary['total_penduduk'] }}</strong>
                    </div>
                    <div class="stat-card">
                        <span class="stat-label">Jenis Kelamin</span>
                        <strong>{{ $summary['jenis_kelamin'] }}</strong>
                    </div>
                    <div class="stat-card">
                        <span class="stat-label">Keagamaan</span>
                        <strong>{{ $summary['keagamaan'] }}</strong>
                    </div>
                    <div class="stat-card">
                        <span class="stat-label">Pekerjaan</span>
                        <strong>{{ $summary['pekerjaan'] }}</strong>
                    </div>
                    <div class="stat-card">
                        <span class="stat-label">Pendidikan</span>
                        <strong>{{ $summary['pendidikan'] }}</strong>
                    </div>
                    <div class="stat-card">
                        <span class="stat-label">Kepala Keluarga</span>
                        <strong>{{ $summary['kepala_keluarga'] }}</strong>
                    </div>
                </div>
            </div>

            <div class="chart-section">
                <div class="section-heading">
                    <span class="section-tag">Visualisasi</span>
                    <h2>Grafik Data Kependudukan</h2>
                </div>
                <div class="chart-grid">
                    <article class="chart-card chart-card-donut">
                        <h3>Jenis Kelamin</h3>
                        <div class="chart-canvas donut-canvas">
                            <canvas id="gender-chart" aria-label="Grafik jenis kelamin"></canvas>
                        </div>
                    </article>
                    <article class="chart-card">
                        <h3>Keagamaan</h3>
                        <div class="chart-canvas horizontal-canvas">
                            <canvas id="religion-chart" aria-label="Grafik keagamaan"></canvas>
                        </div>
                    </article>
                    <article class="chart-card">
                        <h3>Pekerjaan</h3>
                        <div class="chart-canvas horizontal-canvas">
                            <canvas id="job-chart" aria-label="Grafik pekerjaan"></canvas>
                        </div>
                    </article>
                    <article class="chart-card">
                        <h3>Pendidikan</h3>
                        <div class="chart-canvas horizontal-canvas">
                            <canvas id="education-chart" aria-label="Grafik pendidikan"></canvas>
                        </div>
                    </article>
                </div>
                <article class="chart-card chart-card-wide">
                    <div class="chart-card-header">
                        <div>
                            <h3>Perbandingan per RT/RW</h3>
                            <p>Jumlah setiap subkategori dikelompokkan berdasarkan wilayah.</p>
                        </div>
                        <label class="chart-select">
                            <span>Kategori</span>
                            <select id="comparison-category">
                                <option value="Keagamaan">Keagamaan</option>
                                <option value="Pekerjaan" selected>Pekerjaan</option>
                                <option value="Pendidikan">Pendidikan</option>
                            </select>
                        </label>
                    </div>
                    <div class="chart-canvas comparison-canvas">
                        <canvas id="comparison-chart" aria-label="Grafik perbandingan kategori per RT atau RW"></canvas>
                    </div>
                </article>
            </div>

            @php
                $chartData = $data->map(function ($item) {
                    return [
                        'dusun' => $item->dusun,
                        'rt' => $item->rt,
                        'rw' => $item->rw,
                        'tahun' => $item->tahun,
                        'kategori' => $item->kategori,
                        'subkategori' => $item->subkategori,
                        'jumlah' => (int) $item->jumlah,
                    ];
                })->values();
            @endphp
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
            <script>
                window.populationStatistics = @json($chartData);
            </script>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading">
                <span class="section-tag">Data Detail</span>
                <h2>Data berdasarkan kategori</h2>
            </div>

            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dusun</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->dusun }}</td>
                                <td>{{ $item->rt ?: '--' }}</td>
                                <td>{{ $item->rw ?: '--' }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->subkategori }}</td>
                                <td>{{ $item->jumlah }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Data belum tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection