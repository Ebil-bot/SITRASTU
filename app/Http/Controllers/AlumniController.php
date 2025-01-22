<?php

namespace App\Http\Controllers;

use App\Models\AlumniModel;
use App\Models\ProfilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{

    public function tambah()
    {
        return view('alumni.tambah-alumni');
    }

    public function edit($id)
    {
        $alumni = AlumniModel::findOrFail($id);
        return view('alumni.edit-alumni', compact('alumni'));
    }

    public function tambah_aksi(Request $request)
    {
    // Validasi data
    $data = $request->validate([
        'tempat_kerja' => 'required|string|max:255',
        'mulai_kerja' => 'required|string|max:255',
        'akhir_kerja' => 'required|string|max:255',
        'penghasilan' => 'required|string|max:255',
        'jenis_pekerjaan' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
    ]);

    // Mengambil data profil berdasarkan id_user
    $profil = ProfilModel::where('id_user', auth()->id())->first();

    if (!$profil) {
        return redirect()->back()->with('error', 'Profil tidak ditemukan.');
    }

    // Simpan data ke tabel alumni
    AlumniModel::create([
        'id_user' => auth()->id(), // Menggunakan ID pengguna yang sedang login
        'tempat_kerja' => $data['tempat_kerja'],
        'mulai_kerja' => $data['mulai_kerja'],
        'akhir_kerja' => $data['akhir_kerja'],
        'penghasilan' => $data['penghasilan'],
        'jenis_pekerjaan' => $data['jenis_pekerjaan'],
        'jabatan' => $data['jabatan']
    ]);
        return redirect('/alumni')->with('success', 'Tracer Study berhasil ditambahkan!');
    }

    public function edit_aksi(Request $request, $id)
    {
        $data = $request->validate([
            'tempat_kerja' => 'required|string|max:255',
            'mulai_kerja' => 'required|string|max:255',
            'akhir_kerja' => 'required|string|max:255',
            'penghasilan' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255'
        ]);

        $alumni = AlumniModel::findOrFail($id);
        $alumni->update($data);

        return redirect('/alumni')->with('success', 'Tracer Study berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $alumni = AlumniModel::findOrFail($id);
        $alumni->delete();

        return redirect('/alumni')->with('success', 'Tracer Study berhasil dihapus!');
    }

    public function getAlumniData()
    {
        $userId = Auth::id();
        $alumniData = DB::table('profil')
            ->join('alumni', 'profil.id_user', '=', 'alumni.id_user')
            ->join('prodi', 'profil.id_prodi', '=', 'prodi.id') // Join dengan tabel prodi
            ->where('profil.id_user', $userId)
            ->select(
                'profil.nama_mhs',
                'profil.nim_mhs',
                'prodi.nama_prodi',
                'profil.tahun_lulus',
                'alumni.tempat_kerja',
                'alumni.mulai_kerja',
                'alumni.akhir_kerja',
                'alumni.penghasilan',
                'alumni.jenis_pekerjaan',
                'alumni.jabatan',
                'alumni.id as alumni_id'
            )
            ->get();
        return view('alumni.alumni', ['alumni' => $alumniData]);
        
    }
}
