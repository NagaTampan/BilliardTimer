<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan ini ditambahkan

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data jumlah meja yang digunakan hari ini
        $tablesUsedToday = Dashboard::getTablesUsedToday();

        // Mengambil data total waktu bermain hari ini
        $dailyPlayTime = Dashboard::getDailyPlayTime();

        // Mengambil data pendapatan harian
        $dailyRevenue = Dashboard::getDailyRevenue();

        // Mengambil data pendapatan bulanan
        $monthlyRevenue = Dashboard::getMonthlyRevenue();

        // Mengambil data total waktu bermain bulanan
        $monthlyPlayTime = Dashboard::getMonthlyPlayTime();

        // Menyiapkan data untuk grafik bulanan (pendapatan dan waktu bermain untuk setiap bulan)
        $monthlyData = $this->getMonthlyData();

        // Mengirimkan data ke view
        return view('backend.dashboard.index', [
            'tablesUsedToday' => $tablesUsedToday,
            'hours' => $dailyPlayTime['hours'],
            'minutes' => $dailyPlayTime['minutes'],
            'dailyRevenue' => $dailyRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'monthlyHours' => $monthlyPlayTime['hours'],
            'monthlyMinutes' => $monthlyPlayTime['minutes'],
            'monthlyLabels' => $monthlyData['labels'],
            'monthlyRevenueData' => $monthlyData['revenue'],
            'monthlyPlayTimeData' => $monthlyData['playTime']
        ]);
    }

    // Fungsi untuk mengambil data bulanan
    private function getMonthlyData()
    {
        // Ambil data untuk 12 bulan terakhir
        $monthlyRevenue = [];
        $monthlyPlayTime = [];
        $labels = [];
        
        for ($month = 1; $month <= 12; $month++) {
            $monthlyRevenue[] = DB::table('tables')->whereMonth('created_at', $month)->sum('total_price');
            $monthlyPlayTime[] = DB::table('tables')->whereMonth('created_at', $month)
                ->sum(DB::raw('total_time_hours * 3600 + total_time_minutes * 60 + total_time_seconds'));
            $labels[] = \Carbon\Carbon::create()->month($month)->format('F');  // Mengambil nama bulan
        }

        return [
            'labels' => $labels,
            'revenue' => $monthlyRevenue,
            'playTime' => $monthlyPlayTime
        ];
    }
}
