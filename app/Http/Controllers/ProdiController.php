<?php
namespace App\Http\Controllers;

use App\Models\ProdiModel;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = ProdiModel::all();  // Ambil semua data prodi
        return view('prodi.prodi', compact('prodis'));
    }
    
    // Menampilkan halaman form tambah prodi
    public function tambah()
    {
        return view('prodi.tambah-prodi');
    }

    public function edit ($id) {
        $prodi = ProdiModel::findOrFail($id);
        return view('prodi.edit-prodi',compact('prodi'));
    }

    public function edit_aksi(Request $request, $id)
    {
        // Validasi data input yang diterima dari form
        $data = $request->validate([
            'nama_prodi' => 'required',
            'jenjang' => 'required|in:S1,S2', // Pastikan hanya 'S1' atau 'S2'
        ]);
    
        // Temukan prodi berdasarkan ID dan perbarui data
        $prodi = ProdiModel::findOrFail($id);
        $prodi->update($data);
    
        // Redirect ke halaman daftar prodi dengan pesan sukses
        return redirect('/admin/prodi')->with('success', 'Prodi berhasil diperbarui!');
    }
    

    // Menangani proses tambah prodi
    public function tambah_aksi(Request $request)
    {
        // Validasi data
        $data = $request->validate([
            'nama_prodi' => 'required',
            'jenjang' => 'required',
        ]);

        // Simpan data prodi ke dalam database
        ProdiModel::create($data);

        // Redirect ke halaman daftar prodi dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan!');
    }

    // Menampilkan halaman daftar prodi (tabel)

    public function hapus($id)
    {
        // Cari prodi berdasarkan id dan hapus
        $prodi = ProdiModel::findOrFail($id);
        $prodi->delete();

        // Redirect ke halaman daftar prodi dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus!');
    }

}
