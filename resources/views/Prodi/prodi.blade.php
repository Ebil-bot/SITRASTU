@extends('layout.dashboard-app')

@section('dashboard')
@if (auth()->user()->hasRole('admin'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <h1 class="mt-4">Tabel Prodi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel Prodi</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Prodi
            <a href="/admin/prodi/tambah" class="btn btn-sm btn-success float-end">Tambah Prodi</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 25%;">Nama Prodi</th>
                            <th style="width: 10%;">Jenjang</th>
                            <th style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodis as $prodi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td>{{ $prodi->jenjang }}</td>
                            <td>
                                <a href="/admin/prodi/edit/{{ $prodi->id }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="/admin/prodi/hapus/{{ $prodi->id }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
