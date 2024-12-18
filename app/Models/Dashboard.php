<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;

    protected $table = 'tables'; // Nama tabel di database

    protected $fillable = [
        'name',
        'table_number',
        'total_time_hours',
        'total_time_minutes',
        'total_time_seconds',
        'status',
        'total_price',
        'created_at',
        'updated_at'
    ];

    // Fungsi untuk menghitung jumlah meja yang sudah digunakan pada hari ini
    public static function getTablesUsedToday()
    {
        return self::whereDate('created_at', today())  // Memastikan tanggalnya hari ini
                   ->count();  // Menghitung jumlah semua meja yang ditambahkan hari ini
    }

    // Fungsi untuk menghitung total waktu bermain hari ini
    public static function getDailyPlayTime()
    {
        $totalSeconds = self::whereDate('created_at', today())
                            ->sum(DB::raw('total_time_hours * 3600 + total_time_minutes * 60 + total_time_seconds'));

        // Mengonversi total detik menjadi jam, menit, dan detik
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);

        return [
            'hours' => $hours,
            'minutes' => $minutes
        ];
    }

    // Fungsi untuk menghitung pendapatan harian
    public static function getDailyRevenue()
    {
        return self::whereDate('created_at', today())
                   ->sum('total_price');  // Menghitung total pendapatan hari ini
    }

    // Fungsi untuk menghitung pendapatan bulanan
    public static function getMonthlyRevenue()
    {
        return self::whereMonth('created_at', now()->month) // Mengambil bulan saat ini
                   ->sum('total_price');  // Menjumlahkan pendapatan untuk bulan ini
    }

    // Fungsi untuk menghitung total waktu bermain bulanan
    public static function getMonthlyPlayTime()
    {
        $totalSeconds = self::whereMonth('created_at', now()->month)
                            ->sum(DB::raw('total_time_hours * 3600 + total_time_minutes * 60 + total_time_seconds'));

        // Mengonversi total detik menjadi jam, menit, dan detik
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);

        return [
            'hours' => $hours,
            'minutes' => $minutes
        ];
    }
}
