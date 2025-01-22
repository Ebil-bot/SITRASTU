@extends('layout.dashboard-app')

@section('dashboard')
@if (auth()->user()->hasRole('admin'))
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid px-4">
<h1 class="mt-4">Tambah Prodi</h1>
<div class="card mb-4">
    <div class="card-body">
        <form action="/admin/prodi/tambah" method="post">
            @csrf
            <div class="form-group">
                <label for="nama_prodi">Nama Prodi</label>
                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
            </div>
            <div class="form-group">
                <label for="jenjang">Jenjang</label>
                <select class="form-control" id="jenjang" name="jenjang" required>
                    @foreach(\App\Models\ProdiModel::getJenjangOptions() as $jenjang)
                        <option value="{{ $jenjang }}" {{ old('jenjang') == $jenjang ? 'selected' : '' }}>
                            {{ $jenjang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/admin/prodi" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>
@endif
@endsection