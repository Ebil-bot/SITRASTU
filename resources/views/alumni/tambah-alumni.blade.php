@extends('layout.dashboard-app')

@section('dashboard')

@if (auth()->user()->hasRole('alumni'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
<h1 class="mt-4">Tambah Alumni</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="/alumni/tambah" method="post">
                @csrf
                <div class="form-group">
                    <label for="tempat_kerja">Tempat Kerja</label>
                    <input type="text" class="form-control" id="tempat_kerja" name="tempat_kerja" required>
                </div>
                <div class="form-group">
                    <label for="mulai_kerja">Mulai Kerja</label>
                    <input type="text" class="form-control" id="mulai_kerja" name="mulai_kerja" required>
                </div>
                <div class="form-group">
                    <label for="akhir_kerja">Akhir Kerja</label>
                    <input type="text" class="form-control" id="akhir_kerja" name="akhir_kerja" required>
                </div>
                <div class="form-group">
                    <label for="penghasilan">Penghasilan</label>
                    <input type="text" class="form-control" id="penghasilan" name="penghasilan" required>
                </div>
                <div class="form-group">
                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                    <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/alumni" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection