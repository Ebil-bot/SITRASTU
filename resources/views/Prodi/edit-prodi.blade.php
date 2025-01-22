@extends('layout.dashboard-app')

@section('dashboard')
@if (auth()->user()->hasRole('admin'))
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Prodi</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Prodi
        </div>
        <div class="card-body">
            <!-- Form Edit Prodi -->
                <form action="/admin/prodi/edit/{{ $prodi->id }}"  method="POST">
                @csrf
                

                <!-- Nama Prodi -->
                <div class="mb-3">
                    <label for="nama_prodi" class="form-label">Nama Prodi</label>
                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" required>
                </div>

                <!-- Jenjang -->
                <div class="mb-3">
                    <label for="jenjang" class="form-label">Jenjang</label>
                    <select class="form-control" id="jenjang" name="jenjang" required>
                        <option value="S1" {{ old('jenjang', $prodi->jenjang) == 'S1' ? 'selected' : '' }}>S1</option>
                        <option value="S2" {{ old('jenjang', $prodi->jenjang) == 'S2' ? 'selected' : '' }}>S2</option>
                    </select>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/admin/prodi" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection