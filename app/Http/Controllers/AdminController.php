<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('pages.admin.index', [
            'admins' => $admins,
        ]);
    }

    public function show($id)
{
    // Misal ambil data admin dari database
    $admin = Admin::findOrFail($id); // pastikan kamu import model Admin

    return view('admin.show', compact('admin'));
}


    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima, termasuk foto profil
        $validated = $request->validate([
            'name' => 'required|string|max:255',                 // Validasi nama admin, wajib dan string dengan panjang maksimum 255 karakter
            'email' => 'required|email|unique:admins,email',    // Validasi email, wajib dan harus unik di tabel admins
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi foto profil (opsional), hanya menerima gambar dan ukuran maksimal 2MB
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            $path = null;
        }
    

        // Simpan data admin ke database
        $admin = new Admin();
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->profile_picture = $path; // Simpan path foto profil
        $admin->save(); // Simpan admin ke database

        // Redirect atau respon sesuai kebutuhan, misalnya kembali ke halaman daftar admin
        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id); // Menggunakan Admin::findOrFail

        return view('pages.admin.edit', [ // Menggunakan view edit, bukan create
            'admin' => $admin,  // Menggunakan variable 'admin' bukan 'admins'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',                 // Validasi nama admin, wajib dan string dengan panjang maksimum 255 karakter
            'email' => 'required|email|unique:admins,email,' . $id,  // Validasi email, wajib dan harus unik di tabel admins, pengecualian untuk id yang sedang diedit
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi foto profil (opsional), hanya menerima gambar dan ukuran maksimal 2MB
        ]);

        // Temukan admin yang ingin diupdate
        $admin = Admin::findOrFail($id);

        // Proses upload foto profil jika ada
        if ($request->hasFile('profile_picture')) {
            // Simpan foto ke folder 'uploads/profile_pictures' di private storage dan dapatkan nama file
            $path = $request->file('profile_picture')->store('uploads/profile_pictures', 'local');
            $admin->profile_picture = $path;  // Update foto profil
        }

        // Update data admin ke database
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->save(); // Simpan perubahan admin ke database

        // Redirect atau respon sesuai kebutuhan
        return redirect()->route('admins.index')->with('success', 'Admin berhasil diubah.');
    }

    public function destroy($id)
    {
        // Temukan admin yang ingin dihapus
        $admin = Admin::findOrFail($id);
        $admin->delete();  // Hapus data admin

        return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus.');
    }
}
