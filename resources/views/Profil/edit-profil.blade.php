@extends('layout.dashboard-app')

@section('dashboard')
@if (auth()->user()->hasRole(roles: 'admin'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <h1 class="mt-4">Edit Akun dan Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Form Edit Akun dan Profil</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Akun dan Profil
        </div>
        <div class="card-body">
            <form action="/profil/alumni/edit/{{ $user->id }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    <label for="name">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama_mhs">Nama Mahasiswa</label>
                    <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" id="nama_mhs" name="nama_mhs" value="{{ $user->profil->nama_mhs ?? '' }}" required>
                    @error('nama_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nim_mhs">NIM</label>
                    <input type="text" class="form-control @error('nim_mhs') is-invalid @enderror" id="nim_mhs" name="nim_mhs" value="{{ $user->profil->nim_mhs ?? '' }}" required>
                    @error('nim_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ $user->profil->tahun_lulus ?? '' }}" required>
                    @error('tahun_lulus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $user->profil->tgl_lahir ?? '' }}" required>
                    @error('tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $user->profil->tempat_lahir ?? '' }}" required>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ $user->profil->alamat ?? '' }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ ($user->profil->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ ($user->profil->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="agama">Agama</label>
                    <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                        <option value="Islam" {{ ($user->profil->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ ($user->profil->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ ($user->profil->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ ($user->profil->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ ($user->profil->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ ($user->profil->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="id_prodi">Program Studi</label>
                    <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" required>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ ($user->profil->id_prodi ?? '') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/profil/alumni" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@if (auth()->user()->hasRole('alumni'))
<div class="container-fluid px-4">
    <div class="mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <h1 class="mt-4">Edit Akun dan Profil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Form Edit Akun dan Profil</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Akun dan Profil
        </div>
        <div class="card-body">
            <form action="/alumni/profil/edit/{{ $user->id }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    <label for="name">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama_mhs">Nama Mahasiswa</label>
                    <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" id="nama_mhs" name="nama_mhs" value="{{ $user->profil->nama_mhs ?? '' }}" required>
                    @error('nama_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nim_mhs">NIM</label>
                    <input type="text" class="form-control @error('nim_mhs') is-invalid @enderror" id="nim_mhs" name="nim_mhs" value="{{ $user->profil->nim_mhs ?? '' }}" required>
                    @error('nim_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input type="number" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" value="{{ $user->profil->tahun_lulus ?? '' }}" required>
                    @error('tahun_lulus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $user->profil->tgl_lahir ?? '' }}" required>
                    @error('tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $user->profil->tempat_lahir ?? '' }}" required>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ $user->profil->alamat ?? '' }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ ($user->profil->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ ($user->profil->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="agama">Agama</label>
                    <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                        <option value="Islam" {{ ($user->profil->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ ($user->profil->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ ($user->profil->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ ($user->profil->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ ($user->profil->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ ($user->profil->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="id_prodi">Program Studi</label>
                    <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" required>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}" {{ ($user->profil->id_prodi ?? '') == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/alumni/profil" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection