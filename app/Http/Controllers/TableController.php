<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; // Model untuk tabel database

class TableController extends Controller
{
    // Menampilkan semua data dari tabel "tables"
    public function index()
    {
        // Ambil semua data dari tabel "tables" melalui model
        $tables = Table::all();

        // Kirim data ke view "backend.table.index"
        return view('backend.table.index', compact('tables'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tableNumber' => 'required|integer|min:1',
            'totalTimeHours' => 'required|integer|min:0',
            'totalTimeMinutes' => 'required|integer|min:0|max:59',
            'totalTimeSeconds' => 'required|integer|min:0|max:59',
            'totalPrice' => 'required|numeric|min:0',
        ]);
    
        // Simpan data ke database menggunakan Eloquent
        try {
            Table::create([
                'name' => $validated['name'],
                'table_number' => $validated['tableNumber'],
                'total_time_hours' => $validated['totalTimeHours'],
                'total_time_minutes' => $validated['totalTimeMinutes'],
                'total_time_seconds' => $validated['totalTimeSeconds'],
                'total_price' => $validated['totalPrice'],
            ]);
    
            // Berikan respons JSON jika berhasil
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ], 200);
        } catch (\Exception $e) {
            // Berikan respons JSON jika terjadi kesalahan
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
}
