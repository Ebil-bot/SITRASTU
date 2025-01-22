<?php

namespace App\Http\Controllers;

use App\Models\ProdiModel;
use App\Models\ProfilModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function RegisterForm()
    {
        // Mengambil semua data dari tabel Prodi
        $prodi = ProdiModel::all();
        
        // Mengirim data Prodi ke view
        return view('register.register', ['prodi' => $prodi]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:5',
            'nim_mhs' => 'required|string|max:255',
            'tahun_lulus' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role to user
        $user->assignRole('alumni'); // Assumes 'alumni' role exists in the roles table
    
        ProfilModel::create([
            'nama_mhs' => $request->first_name . ' ' . $request->last_name,
            'nim_mhs' => $request->nim_mhs,
            'tahun_lulus' => $request->tahun_lulus,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'id_prodi' => $request->id_prodi,
            'id_user' => $user->id,
        ]);
    
        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silahkan login.');
    }
}
