<?php

namespace App\Http\Controllers;

use App\Models\ProfilModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
        //profil untuk alumni
        public function profilIndex()
        {
            // Cek apakah user yang login adalah admin
            if (Auth::user()->role === 'admin') {
                // Jika admin, ambil semua data user dengan relasinya
                $users = User::with(['profil', 'profil.prodi'])->get();
                return view('Profil.profil', compact('users'));
            }

            // Mengambil profil dari pengguna yang sedang login
            $user = User::with('profil')->where('id', Auth::id())->firstOrFail();
            // Menampilkan view dengan data user yang sedang login
            return view('profil.profil', ['user' => $user]);
        }

    
        public function profil_tambah()
        {
            return view('profil.tambah-profil');
        }

        public function profil_tambah_aksi(Request $request) {
            $request->validate([
                'nama_mhs' => 'required',
                'nim_mhs' => 'required', 
                'tgl_lahir' => 'required|date',
                'tempat_lahir' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'id_prodi' => 'required|exists:prodi,id',
            ]);
    
            ProfilModel::create([
                'nama_mhs' => $request->nama_mhs,
                'nim_mhs' => $request->nim_mhs,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'id_prodi' => $request->id_prodi,
                'id_user' => Auth::id(),
            ]);

            return redirect('/profil/alumni')->with('success', 'Profil berhasil ditambahkan!');
        }

        public function profil_edit($id) {
            $user = User::with('profil')->findOrFail($id);
            $prodis = \App\Models\ProdiModel::all();
            return view('profil.edit-profil', compact('user', 'prodis'));
        }

        public function profil_edit_aksi(Request $request, $id) {

        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'nama_mhs' => 'required',
        'nim_mhs' => 'required',
        'id_prodi' => 'required|exists:prodi,id',
        'tahun_lulus' => 'required',
        'tgl_lahir' => 'required|date',
        'tempat_lahir' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
    ]);

    // Perbarui data di tabel `users`
    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Perbarui atau buat profil di tabel `profil`
    $user->profil()->updateOrCreate(
        ['id_user' => $user->id],
        [
            'nama_mhs' => $request->nama_mhs,
            'nim_mhs' => $request->nim_mhs,
            'id_prodi' => $request->id_prodi,
            'tahun_lulus' => $request->tahun_lulus,
            'tgl_lahir' => $request->tgl_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
        ]
    );
    
            // Redirect berdasarkan peran pengguna
            if (auth()->user()->hasRole('admin')) {
                return redirect('/profil/alumni')->with('success', 'Profil berhasil diperbarui!');
            } elseif (auth()->user()->hasRole('alumni')) {
                return redirect('/alumni/profil')->with('success', 'Profil berhasil diperbarui!');
            } 
        }
        

        public function profil_hapus($id) {
            $profil = ProfilModel::findOrFail($id);
            $profil->delete();

            return redirect('/profil/alumni')->with('success', 'Profil berhasil dihapus!');
        }
}
