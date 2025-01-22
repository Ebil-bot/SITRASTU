@extends('layout.dashboard-app')

@section('dashboard')
<div class="container-fluid px-4">
    <div class="mt-3">
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
</div>
    <h1 class="mt-4">Tabel User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel User</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Akun
            {{-- <a href="/akun/tambah" class="btn btn-sm btn-success float-end">Tambah Akun</a> --}}
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                        <td>
                            <a href="{{ route('update', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="/admin/auth/hapus/{{ $user->id }}" method="post" style="display: inline-block">
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
@endsection
