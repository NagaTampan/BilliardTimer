<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'tables';  // Menggunakan huruf kapital untuk tabel

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'table_number',
        'total_time_hours',
        'total_time_minutes',
        'total_time_seconds',
        'total_price',
    ];
}
