<?php
// app/Models/Table.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan nama model (laravel default plural)
    protected $table = 'tables';

    // Tentukan field yang bisa diisi (mass assignment)
    protected $fillable = [
        'name', 
        'table_number', 
        'total_time_hours', 
        'total_time_minutes', 
        'total_time_seconds', 
        'total_price'
    ];
}
