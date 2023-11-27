@extends('layouts.app')

@section('title', 'Tambah Data siswa')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Data siswa</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        Gagal Mengedit Data siswa
                        <ul>
                            @foreach($errors->all() as $error) 
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/siswa/{{ $siswa->nis }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama siswa</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_siswa') is-invalid @enderror" type="text" name="nm_siswa" value=" {{ old('nm_siswa', $siswa->nm_siswa) }}">
                            @error('nm_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tempat Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tmp_lahir') is-invalid @enderror" type="text" name="tmp_lahir" value="{{ old('tmp_lahir', $siswa->tmp_lahir) }}">
                            @error('tmp_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tanggal Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $siswa->tgl_lahir) }}">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Jenis Kelamin</label> 
                        <div class="col-md-9 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel" value="L" {{ ($siswa->jkel == 'L' || old('jkel') == 'L') ? 'checked' : '' }}>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel" value="P" {{ ($siswa->jkel == 'P' || old('jkel') == 'P') ? 'checked' : '' }}>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Alamat</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" value="{{ old('alamat', $siswa->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Telepon</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('telp') is-invalid @enderror" type="text" name="telp" value="{{ old('telp', $siswa->telp) }}">
                            @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Wali</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_wali') is-invalid @enderror" type="text" name="nm_wali" value="{{ old('nm_wali', $siswa->nm_wali) }}">
                            @error('nm_wali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Pilih Kelas</label>
                        <div class="col-md-9">
                            <select class="form-select" id="kd_kelas" name="kd_kelas">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelass as $kelas)
                                    <option value="{{ $kelas }}" 
                                        {{ (old('kd_kelas') == $kelas) ? 'selected' : '' }}>
                                        {{ $kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Username</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username', $siswa->username) }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Password</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password', $siswa->password) }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/siswa">Kembali</a>
                        <button class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection