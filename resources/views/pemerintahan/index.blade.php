@extends('layouts.app')

@section('title', 'Pemerintahan | Candi Wetan')

@section('content')
    <section class="page-hero small-hero">
        <div class="container">
            <span class="section-tag">Pemerintahan</span>
            <h1>Struktur Pemerintahan Padukuhan</h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-heading center">
                <span class="section-tag">Struktur Padukuhan</span>
                <h2>Struktur Organisasi Padukuhan Candi Wetan</h2>
            </div>

            <!-- Organizational Chart Diagram -->
            <div class="org-chart-wrapper">
                <div class="org-chart-tree">
                    <!-- Top: Dukuh -->
                    <div class="org-card leader-card">
                        <span class="org-badge">Kepala Padukuhan / Dukuh</span>
                        <h3 class="org-name">Sigit Wahyu Subekti</h3>
                        <span class="org-title">Dukuh Candi Wetan</span>
                    </div>

                    <div class="org-line-v"></div>

                    <!-- Level 2: RW 5 & RW 6 -->
                    <div class="org-branch-container">
                        <!-- RW 5 Branch -->
                        <div class="org-branch-node">
                            <div class="org-card rw-card">
                                <span class="org-badge">Ketua RW 05</span>
                                <h4 class="org-name">Mariyo</h4>
                                <span class="org-title">Pengurus RW 05</span>
                            </div>

                            <div class="org-line-v"></div>

                            <!-- Level 3: RT 9 & RT 11 -->
                            <div class="org-sub-branch-container">
                                <div class="org-rt-node">
                                    <div class="org-card rt-card">
                                        <span class="org-badge-rt">RT 09</span>
                                        <h5 class="org-name">R. Dalyantoro</h5>
                                        <span class="org-title">Ketua RT 09</span>
                                    </div>
                                </div>
                                <div class="org-rt-node">
                                    <div class="org-card rt-card">
                                        <span class="org-badge-rt">RT 11</span>
                                        <h5 class="org-name">Legiran</h5>
                                        <span class="org-title">Ketua RT 11</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- RW 6 Branch -->
                        <div class="org-branch-node">
                            <div class="org-card rw-card">
                                <span class="org-badge">Ketua RW 06</span>
                                <h4 class="org-name">R. Sigit Santoso</h4>
                                <span class="org-title">Pengurus RW 06</span>
                            </div>

                            <div class="org-line-v"></div>

                            <!-- Level 3: RT 10 & RT 12 -->
                            <div class="org-sub-branch-container">
                                <div class="org-rt-node">
                                    <div class="org-card rt-card">
                                        <span class="org-badge-rt">RT 10</span>
                                        <h5 class="org-name">Suparjo</h5>
                                        <span class="org-title">Ketua RT 10</span>
                                    </div>
                                </div>
                                <div class="org-rt-node">
                                    <div class="org-card rt-card">
                                        <span class="org-badge-rt">RT 12</span>
                                        <h5 class="org-name">Sudaman</h5>
                                        <span class="org-title">Ketua RT 12</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
