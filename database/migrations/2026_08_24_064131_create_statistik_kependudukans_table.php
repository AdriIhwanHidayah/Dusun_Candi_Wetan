<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistik_kependudukans', function (Blueprint $table) {
            $table->id();

            $table->string('dusun');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();

            $table->integer('tahun');

            $table->string('kategori');
            $table->string('subkategori');

            $table->integer('jumlah')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_kependudukans');
    }
};