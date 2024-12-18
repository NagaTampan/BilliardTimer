<?php

namespace App\Http\Controllers;

use App\Models\User;  // Menggunakan model User, bukan Payment
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::paginate(10);  // Mengambil daftar pengguna dengan pagination
        return view('backend.users.index', compact('users'));  // Menampilkan data users pada view
    }

    // Menampilkan form untuk menambahkan pengguna baru
    public function create()
    {
        return view('backend.users.create'); // Menampilkan halaman form untuk membuat user
    }

    // Menyimpan data pengguna baru
   // UserController.php

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    try {
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcypt($validated['password']),
        ]);

        return redirect()->route('users.index')->with('status', 'User created successfully!');
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'There was a problem creating the user.');
    }
}

public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    try {
        $user->update($validated);

        return redirect()->route('users.index')->with('status', 'User updated successfully!');
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'There was a problem updating the user.');
    }
}

public function destroy(User $user)
{
    try {
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'There was a problem deleting the user.');
    }
}
}