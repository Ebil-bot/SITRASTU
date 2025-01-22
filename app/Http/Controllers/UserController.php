<?php

namespace App\Http\Controllers;

// use App\Models\ProdiModel;
// use App\Models\ProfilModel;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function TabelAkun()
    {
        $users = User::with('roles')->get(); // Mengambil semua pengguna dengan role
        return view('admin.user-akun', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.edit-akun', compact('user', 'roles'));
    }

    public function edit_aksi(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:alumni,admin',
        ]);
    
        // Update data pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
    
        return redirect()->route('admin.user-akun', ['id' => $id])->with('success', 'User berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('admin.user-akun')->with('success', 'User berhasil dihapus!');
    }
}
