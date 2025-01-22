<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function download_pdf(){
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $startDate = request()->input('start_date');
        $endDate = request()->input('end_date');

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
                'users.email',
                'alumni.created_at as created'
            )
            ->get();

        $html = '<h2>Data Tracer Study Alumni</h2>';
        $html .= '<p>Periode: '.$startDate.' - '.$endDate.'</p>';
        $html .= '<table border="1" cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Tahun Lulus</th>
                <th>Tempat Kerja</th>
                <th>Mulai Kerja</th>
                <th>Akhir Kerja</th>
                <th>Penghasilan</th>
                <th>Jenis Pekerjaan</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Dibuat</th>
            </tr>';

        foreach($alumniData as $data){
            $html .= '<tr>
                <td>'.$data->nama_mhs.'</td>
                <td>'.$data->nim_mhs.'</td>
                <td>'.$data->nama_prodi.'</td>
                <td>'.$data->tahun_lulus.'</td>
                <td>'.$data->tempat_kerja.'</td>
                <td>'.$data->mulai_kerja.'</td>
                <td>'.$data->akhir_kerja.'</td>
                <td>'.$data->penghasilan.'</td>
                <td>'.$data->jenis_pekerjaan.'</td>
                <td>'.$data->jabatan.'</td>
                <td>'.$data->email.'</td>
                <td>'.$data->created.'</td>
            </tr>';
        }
        $html .= '</table>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        
        $mpdf->Output('laporan-tracer-study.pdf', 'D');
    }

    
    public function laporan_profil_alumni(){
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $startDate = request()->input('start_date');
        $endDate = request()->input('end_date');

        $profilData = DB::table('profil')
            ->join('users', 'profil.id_user', '=', 'users.id')
            ->join('prodi', 'profil.id_prodi', '=', 'prodi.id')
            //->whereBetween('profil.created_at', [$startDate, $endDate]) // Filter berdasarkan periode
            ->select(
                'profil.nama_mhs',
                'profil.nim_mhs', 
                'prodi.nama_prodi',
                'profil.tahun_lulus',
                'users.email',
                'profil.created_at as created',
                'profil.tgl_lahir',
                'profil.tempat_lahir',
                'profil.alamat',
                'profil.jenis_kelamin',
                'profil.agama'
            )
            ->get();

        $html = '<h2>Data Profil Alumni</h2>';
        $html .= '<p>Periode: '.$startDate.' - '.$endDate.'</p>';
        $html .= '<table border="1" cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Tahun Lulus</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Email</th>
                <th>Dibuat</th>
            </tr>';

        foreach($profilData as $data){
            $html .= '<tr>
                <td>'.$data->nama_mhs.'</td>
                <td>'.$data->nim_mhs.'</td>
                <td>'.$data->nama_prodi.'</td>
                <td>'.$data->tahun_lulus.'</td>
                <td>'.$data->tgl_lahir.'</td>
                <td>'.$data->tempat_lahir.'</td>
                <td>'.$data->alamat.'</td>
                <td>'.$data->jenis_kelamin.'</td>
                <td>'.$data->agama.'</td>
                <td>'.$data->email.'</td>
                <td>'.$data->created.'</td>
            </tr>';
        }
        $html .= '</table>';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        
        $mpdf->Output('laporan-profil-alumni.pdf', 'D');
    }

    public function view_pdf(){
        // Tambahkan pemeriksaan otorisasi
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

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
                'users.email',
                'alumni.id as alumni_id'
            )
            ->get();

            //return view("alumni.alumni", ['alumni' => $alumniData]);

        $html = '<h2>Data Tracer Study Alumni</h2>';
        $html .= '<table border="1" cellpadding="4" cellspacing="0" width="100%">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Tahun Lulus</th>
                <th>Tempat Kerja</th>
                <th>Mulai Kerja</th>
                <th>Akhir Kerja</th>
                <th>Penghasilan</th>
                <th>Jenis Pekerjaan</th>
                <th>Jabatan</th>
                <th>Email</th>
            </tr>';

        foreach($alumniData as $data){
            $html .= '<tr>
                <td>'.$data->nama_mhs.'</td>
                <td>'.$data->nim_mhs.'</td>
                <td>'.$data->nama_prodi.'</td>
                <td>'.$data->tahun_lulus.'</td>
                <td>'.$data->tempat_kerja.'</td>
                <td>'.$data->mulai_kerja.'</td>
                <td>'.$data->akhir_kerja.'</td>
                <td>'.$data->penghasilan.'</td>
                <td>'.$data->jenis_pekerjaan.'</td>
                <td>'.$data->jabatan.'</td>
                <td>'.$data->email.'</td>
            </tr>';
        }
        $html .= '</table>';
        
        //return view("alumni.alumni", ['alumni' => $alumniData, 'html' => $html]);

        // echo $html;
        // exit; // Menghentikan eksekusi setelah menampilkan HTML

        //Inisialisasi mPDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        // Tampilkan PDF di browser
        return $mpdf->Output('laporan-tracer-study.pdf', 'I');
    }
}

