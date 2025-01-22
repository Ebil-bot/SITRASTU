@extends('layout.register-app')

@section('register')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-7">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputFirstName" name="first_name" type="text" placeholder="Enter your first name" required />
                            <label for="inputFirstName">First name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="inputLastName" name="last_name" type="text" placeholder="Enter your last name" required />
                            <label for="inputLastName">Last name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" required />
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" required />
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputPasswordConfirm" name="password_confirmation" type="password" placeholder="Confirm password" required />
                            <label for="inputPasswordConfirm">Confirm Password</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputNIM" name="nim_mhs" type="text" placeholder="Enter your NIM" required />
                    <label for="inputNIM">NIM</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputTahunLulus" name="tahun_lulus" type="text" placeholder="Enter your graduation year" required />
                    <label for="inputTahunLulus">Tahun Lulus</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputBirthDate" name="tgl_lahir" type="date" placeholder="Enter your birth date" required />
                    <label for="inputBirthDate">Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputBirthPlace" name="tempat_lahir" type="text" placeholder="Enter your birth place" required />
                    <label for="inputBirthPlace">Tempat Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputAddress" name="alamat" type="text" placeholder="Enter your address" required />
                    <label for="inputAddress">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" id="inputGender" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="inputGender">Jenis Kelamin</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" id="inputReligion" name="agama" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                    <label for="inputReligion">Agama</label>
                </div>
                
                <!-- Dropdown for id_prodi -->
                <div class="form-floating mb-3">
                    <select class="form-control" id="inputProdi" name="id_prodi" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach($prodi as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_prodi }}</option>
                        @endforeach
                    </select>
                    <label for="inputProdi">Program Studi</label>
                </div>

                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="/login">Have an account? Go to login</a></div>
        </div>
    </div>
</div>
@endsection
