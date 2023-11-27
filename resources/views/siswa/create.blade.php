@extends('layouts.app')

@section('title', 'Tambah Data siswa')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Input Data siswa</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        Gagal Memasukan Data siswa
                        <ul>
                            @foreach($errors->all() as $error) 
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    @method("POST")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">NIS</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nis') is-invalid @enderror" type="text" name="nis" value=" {{ old('nis') }}">
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama siswa</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_siswa') is-invalid @enderror" type="text" name="nm_siswa" value=" {{ old('nm_siswa') }}">
                            @error('nm_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tempat Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tmp_lahir') is-invalid @enderror" type="text" name="tmp_lahir" value="{{ old('tmp_lahir') }}">
                            @error('tmp_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tanggal Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Jenis Kelamin</label> 
                        <div class="col-md-9 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel" value="L" {{ old('jkel') == 'L' ? 'checked' : '' }}>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel" value="P" {{ old('jkel') == 'P' ? 'checked' : '' }}>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Alamat</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Telepon</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('telp') is-invalid @enderror" type="text" name="telp" value="{{ old('telp') }}">
                            @error('telp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Wali</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_wali') is-invalid @enderror" type="text" name="nm_wali" value="{{ old('nm_wali') }}">
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
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Password</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/siswa">Kembali</a>
                        <button class="btn btn-primary">Input Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection