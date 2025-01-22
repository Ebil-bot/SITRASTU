<?php

namespace App\Http\Controllers;

use App\Models\AlumniModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminAlumni()
    {
        $alumniData = DB::table('profil')
            ->join('alumni', 'profil.id_user', '=', 'alumni.id_user')
            ->join('prodi', 'profil.id_prodi', '=', 'prodi.id')
            ->join('users', 'profil.id_user', '=', 'users.id')
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
                'alumni.id as alumni_id',
                'users.email'
            )
            ->get();
        return view('alumni.alumni', ['alumni' => $alumniData]);
    }

    public function tambahAlumni()
    {
        $prodi = ProdiModel::all();
        return view('alumni.tambah-alumni', compact('prodi'));
    }

    public function editAlumni($id)
    {
        $alumni = AlumniModel::findOrFail($id);
        $prodi = ProdiModel::all();
        return view('alumni.edit-alumni', compact('alumni', 'prodi'));
    }

    public function tambah_aksiAlumni(Request $request)
    {
        $data = $request->validate([
            'tempat_kerja' => 'required|string|max:255',
            'mulai_kerja' => 'required|string|max:255',
            'akhir_kerja' => 'required|string|max:255',
            'penghasilan' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255'
        ]);

        AlumniModel::create([
            'id_user' => $request->id_user,
            'tempat_kerja' => $data['tempat_kerja'],
            'mulai_kerja' => $data['mulai_kerja'],
            'akhir_kerja' => $data['akhir_kerja'],
            'penghasilan' => $data['penghasilan'],
            'jenis_pekerjaan' => $data['jenis_pekerjaan'],
            'jabatan' => $data['jabatan']
        ]);

        return redirect('/admin/alumni')->with('success', 'Tracer Study berhasil ditambahkan!');
    }

    public function edit_aksiAlumni(Request $request, $id)
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

        return redirect('/admin/alumni')->with('success', 'Tracer Study berhasil diperbarui!');
    }

    public function hapusAlumni($id)
    {
        $alumni = AlumniModel::findOrFail($id);
        $alumni->delete();

        return redirect('/admin/alumni')->with('success', 'Tracer Study berhasil dihapus!');
    }
}
