<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Menampilkan daftar pembayaran
    public function index()
    {
        $payment = Payment::paginate(10);  
        return view('backend.payment.index', compact('payment'));
    }

    // Menampilkan form untuk menambahkan pembayaran baru
    public function create()
    {
        return view('backend.payment.create'); // Pastikan ada view create.blade.php
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string',
            'table_number' => 'required|integer',
            'total_time_hours' => 'required|integer',
            'total_time_minutes' => 'required|integer',
            'total_time_seconds' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Menyimpan data pembayaran baru
        Payment::create($validated);

        // Mengalihkan ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Payment added successfully');
    }

    // Menampilkan form untuk mengedit data pembayaran
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);  // Mengambil data pembayaran berdasarkan ID
        return view('backend.payment.edit', compact('payment')); // Pastikan ada view edit.blade.php
    }

    // Memperbarui data pembayaran
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string',
            'table_number' => 'required|integer',
            'total_time_hours' => 'required|integer',
            'total_time_minutes' => 'required|integer',
            'total_time_seconds' => 'required|integer',
            'total_price' => 'required|numeric',
        ]);

        // Mengambil data pembayaran berdasarkan ID
        $payment = Payment::findOrFail($id);  
        $payment->update($validated); // Memperbarui data pembayaran

        // Mengalihkan ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Payment updated successfully');
    }

    // Menghapus data pembayaran
    public function destroy($id)
    {
        // Mengambil data pembayaran berdasarkan ID
        $payment = Payment::findOrFail($id);  
        $payment->delete(); // Menghapus data pembayaran

        // Mengalihkan ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('payment.index')->with('success', 'Payment deleted successfully');
    }
}
