@extends('layout.dashboard-app')

@section('dashboard')
<style>
    .btn-custom {
        height:40%;
    }
</style>
@if (auth()->user()->hasRole('admin'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <h1 class="mt-4">Tracer Study</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tracer Study Alumni</li>
    </ol>
<div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                Tracer Study
                            </div>
                            <form action="{{ route('laporan.download') }}" method="GET" class="d-flex">
                                <div class="mb-3 me-2">
                                    <label for="start_date" class="form-label">Tanggal Mulai:</label>
                                    <input type="date" id="start_date" name="start_date" required class="form-control">
                                </div>
                                <div class="mb-3 me-2">
                                    <label for="end_date" class="form-label">Tanggal Akhir:</label>
                                    <input type="date" id="end_date" name="end_date" required class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm btn-custom mt-4">Download Laporan</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Nama Alumni</th>
                                        <th style="width: 10%">NIM</th>
                                        <th style="width: 10%">Prodi</th>
                                        <th style="width: 8%">Tahun Lulus</th>
                                        <th style="width: 10%">Tempat Kerja</th>
                                        <th style="width: 8%">Mulai Kerja</th>
                                        <th style="width: 8%">Akhir Kerja</th>
                                        <th style="width: 8%">Penghasilan</th>
                                        <th style="width: 8%">Jenis Pekerjaan</th>
                                        <th style="width: 8%">Jabatan</th>
                                        <th style="width: 15%">Email</th>
                                        <th style="width: 12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alumni as $lulus)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $lulus->nama_mhs }}</td>
                                            <td>{{ $lulus->nim_mhs }}</td>
                                            <td>{{ $lulus->nama_prodi }}</td>
                                            <td class="text-center">{{ $lulus->tahun_lulus }}</td>
                                            <td>{{ $lulus->tempat_kerja }}</td>
                                            <td>{{ $lulus->mulai_kerja }}</td>
                                            <td>{{ $lulus->akhir_kerja }}</td>
                                            <td>{{ $lulus->penghasilan }}</td>
                                            <td>{{ $lulus->jenis_pekerjaan }}</td>
                                            <td>{{ $lulus->jabatan }}</td>
                                            <td>{{ $lulus->email }}</td>
                                            <td class="text-center">
                                                <a href="/admin/alumni/edit/{{ $lulus->alumni_id }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                                                <form action="admin/alumni/hapus/{{ $lulus->alumni_id }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Tidak ada data tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>                                
                            </table>
                            </div>
                        </div>
                </div>
        </div>
    @endif
    
@if (auth()->user()->hasRole('alumni'))
{{-- <div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <h1 class="mt-4">Tracer Study</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tracer Study Anda</li>
    </ol>
<div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                                Tracer Study
                                <a href="/alumni/tambah" class="btn btn-sm btn-success float-end">Tambah Tracer Study</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse ($alumni as $lulus)
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $lulus->nama_mhs }}</h5>
                                                <p class="card-text">NIM: {{ $lulus->nim_mhs }}</p>
                                                <p class="card-text">Prodi: {{ $lulus->nama_prodi }}</p>
                                                <p class="card-text">Tahun Lulus: {{ $lulus->tahun_lulus }}</p>
                                                <p class="card-text">Tempat Kerja: {{ $lulus->tempat_kerja }}</p>
                                                <p class="card-text">Mulai Kerja: {{ $lulus->mulai_kerja }}</p>
                                                <p class="card-text">Akhir Kerja: {{ $lulus->akhir_kerja }}</p>
                                                <p class="card-text">Penghasilan: {{ $lulus->penghasilan }}</p>
                                                <p class="card-text">Jenis Pekerjaan: {{ $lulus->jenis_pekerjaan }}</p>
                                                <p class="card-text">Jabatan: {{ $lulus->jabatan }}</p>
                                                <div class="text-center">
                                                    <form action="/alumni/hapus/{{ $lulus->alumni_id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger float-end">Hapus</button>
                                                    </form>
                                                    <a href="/alumni/edit/{{ $lulus->alumni_id }}" class="btn btn-sm btn-primary float-end me-1">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 text-center">
                                        <p>Tidak ada data tersedia</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                </div>
        </div> --}}

        <div class="container-fluid px-4">
            <div class="mt-3">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <h1 class="mt-4">Tracer Study</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tracer Study Anda</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tracer Study
                    <a href="/alumni/tambah" class="btn btn-sm btn-success float-end">Tambah Tracer Study</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($alumni as $lulus)
                            <div class="col-md-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lulus->nama_mhs }}</h5>
                                        <p class="card-text">NIM: {{ $lulus->nim_mhs }}</p>
                                        <p class="card-text">Prodi: {{ $lulus->nama_prodi }}</p>
                                        <p class="card-text">Tahun Lulus: {{ $lulus->tahun_lulus }}</p>
                                        <p class="card-text">Tempat Kerja: {{ $lulus->tempat_kerja }}</p>
                                        <p class="card-text">Mulai Kerja: {{ $lulus->mulai_kerja }}</p>
                                        <p class="card-text">Akhir Kerja: {{ $lulus->akhir_kerja }}</p>
                                        <p class="card-text">Penghasilan: {{ $lulus->penghasilan }}</p>
                                        <p class="card-text">Jenis Pekerjaan: {{ $lulus->jenis_pekerjaan }}</p>
                                        <p class="card-text">Jabatan: {{ $lulus->jabatan }}</p>
                                        <div class="text-center">
                                            <form action="/alumni/hapus/{{ $lulus->alumni_id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger float-end">Hapus</button>
                                            </form>
                                            <a href="/alumni/edit/{{ $lulus->alumni_id }}" class="btn btn-sm btn-primary float-end me-1">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>Tidak ada data tersedia</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
