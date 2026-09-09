<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikKependudukan extends Model
{
    use HasFactory;

    protected $table = 'statistik_kependudukans';

    protected $fillable = [
        'dusun',
        'rt',
        'rw',
        'tahun',
        'kategori',
        'subkategori',
        'jumlah',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'jumlah' => 'integer',
    ];
}