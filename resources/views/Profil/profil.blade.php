@extends('layout.dashboard-app')

@section('dashboard')
<style>
    .btn-custom {
        height:40%; /* Atur lebar tombol sesuai kebutuhan */
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
    <h1 class="mt-4">Biodata Alumni</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Biodata Alumni</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-user me-1"></i>
                Biodata Alumni
            </div>
            <form action="{{ route('laporan.profil') }}" method="GET" class="d-flex">
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
                            <th style="width: 10%">Username</th>
                            <th style="width: 15%">Email</th>
                            <th style="width: 15%">Nama Mahasiswa</th>
                            <th style="width: 10%">NIM</th>
                            <th style="width: 15%">Program Studi</th>
                            <th style="width: 10%">Tahun Lulus</th>
                            <th style="width: 10%">Tanggal Lahir</th>
                            <th style="width: 10%">Tempat Lahir</th>
                            <th style="width: 15%">Alamat</th>
                            <th style="width: 10%">Jenis Kelamin</th>
                            <th style="width: 10%">Agama</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if($user->hasRole('alumni'))
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profil->nama_mhs ?? '' }}</td>
                                <td>{{ $user->profil->nim_mhs ?? '' }}</td>
                                <td>{{ $user->profil->prodi->nama_prodi ?? '-' }}</td>
                                <td>{{ $user->profil->tahun_lulus ?? '' }}</td>
                                <td>{{ $user->profil->tgl_lahir ?? '' }}</td>
                                <td>{{ $user->profil->tempat_lahir ?? '' }}</td>
                                <td>{{ $user->profil->alamat ?? '' }}</td>
                                <td>{{ $user->profil->jenis_kelamin ?? '' }}</td>
                                <td>{{ $user->profil->agama ?? '' }}</td>
                                <td>
                                    <a href="/profil/alumni/edit/{{ $user->id }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

@if (auth()->user()->hasRole('alumni'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <h1 class="mt-4">Biodata diri</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Biodata Anda</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Biodata
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ auth()->user()->name }}</h5>
                            <p class="card-text">Email: {{ auth()->user()->email }}</p>
                            <p class="card-text">Nama Mahasiswa: {{ auth()->user()->profil->nama_mhs ?? '' }}</p>
                            <p class="card-text">NIM: {{ auth()->user()->profil->nim_mhs ?? '' }}</p>
                            <p class="card-text">Program Studi: {{ auth()->user()->profil->prodi->nama_prodi ?? '-' }}</p>
                            <p class="card-text">Tahun Lulus: {{ auth()->user()->profil->tahun_lulus ?? '' }}</p>
                            <p class="card-text">Tanggal Lahir: {{ auth()->user()->profil->tgl_lahir ?? '' }}</p>
                            <p class="card-text">Tempat Lahir: {{ auth()->user()->profil->tempat_lahir ?? '' }}</p>
                            <p class="card-text">Alamat: {{ auth()->user()->profil->alamat ?? '' }}</p>
                            <p class="card-text">Jenis Kelamin: {{ auth()->user()->profil->jenis_kelamin ?? '' }}</p>
                            <p class="card-text">Agama: {{ auth()->user()->profil->agama ?? '' }}</p>
                            <div class="text-center">
                                <a href="/alumni/profil/edit/{{ auth()->user()->id }}" class="btn btn-sm btn-primary float-end me-1">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
