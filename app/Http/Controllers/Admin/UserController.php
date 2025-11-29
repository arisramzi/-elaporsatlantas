<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. HALAMAN DAFTAR USER
    public function index()
    {
        // Ambil semua user, urutkan dari yang terbaru
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    // 2. HALAMAN TAMBAH USER BARU
    public function create()
    {
        return view('admin.users.create');
    }

    // 3. PROSES SIMPAN USER BARU
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,petugas,masyarakat',
        ]);

        // Simpan ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Pastikan baris ini ada!
        ]);
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    // --- FUNGSI MENAMPILKAN FORM EDIT ---
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // --- FUNGSI MENYIMPAN PERUBAHAN (UPDATE) ---
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi (Email boleh sama kalau punya sendiri)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:admin,petugas,masyarakat',
        ]);

        // Update Data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Kalau password diisi, baru diupdate. Kalau kosong, biarkan lama.
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    // --- FUNGSI HAPUS (DESTROY) ---
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Cegah admin menghapus diri sendiri
        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}