<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;  // Tambahkan ini untuk hashing password

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel yang digunakan (tabel 'users')
    protected $table = 'users';  // Secara default sudah sesuai, ini opsional jika nama tabel sesuai dengan konvensi

    // Kolom yang dapat diisi
    protected $fillable =  [
      'id', 'name', 'email', 'password',
    ];

    // Jika tabel 'users' memiliki timestamp, Anda bisa mengaktifkan ini
    public $timestamps = true;

    // Override method untuk hashing password secara otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->password) {
                $user->password = Hash::make($user->password);  // Hash password sebelum disimpan
            }
        });
    }
}
