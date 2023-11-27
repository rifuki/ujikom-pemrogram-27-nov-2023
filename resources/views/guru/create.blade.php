@extends('layouts.app')

@section('title', 'Tambah Data Guru')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Input Data Guru</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        Gagal Memasukan Data Guru
                        <ul>
                            @foreach($errors->all() as $error) 
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    @method("POST")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">NIP</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nip') is-invalid @enderror" type="text" name="nip" value=" {{ old('nip') }}">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Guru</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_guru') is-invalid @enderror" type="text" name="nm_guru" value=" {{ old('nm_guru') }}">
                            @error('nm_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tempat Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tmp_lahir_guru') is-invalid @enderror" type="text" name="tmp_lahir_guru" value="{{ old('tmp_lahir_guru') }}">
                            @error('tmp_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Tanggal Lahir</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('tgl_lahir_guru') is-invalid @enderror" type="date" name="tgl_lahir_guru" value="{{ old('tgl_lahir_guru') }}">
                            @error('tgl_lahir_guru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Jenis Kelamin</label> 
                        <div class="col-md-9 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel_guru" value="L" {{ old('jkel_guru') == 'L' ? 'checked' : '' }}>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jkel_guru" value="P" {{ old('jkel_guru') == 'P' ? 'checked' : '' }}>
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
                        <label class="col-form-label col-md-3">Pilih Mata Pelajaran</label>
                        <div class="col-md-9">
                            <select class="form-select @error('kd_matpel') is-invalid @enderror" id="kd_matpel" name="kd_matpel">
                                <option value="" name="">Pilih Mata Pelajaran</option>
                                @foreach($matpels as $id => $nama)
                                    <option value="{{ $nama }}" data-nama="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                            @error('kd_matpel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Mata Pelajaran</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="nm_matpel" id="nm_matpel" readonly>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/guru">Kembali</a>
                        <button class="btn btn-primary">Input Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection