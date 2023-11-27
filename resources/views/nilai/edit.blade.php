@extends('layouts.app')

@section('title', 'Tambah Data nilai')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Data nilai</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        Gagal Mengupdate Data nilai
                        <ul>
                            @foreach($errors->all() as $error) 
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/nilai/{{ $nilai->kd_nilai }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">NIS</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nis') is-invalid @enderror" type="text" name="nis" value=" {{ old('nis', $nilai->nis) }}">
                            @error('nis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Siswa</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_siswa') is-invalid @enderror" type="text" name="nm_siswa" value=" {{ old('nm_siswa', $nilai->nm_siswa) }}">
                            @error('nm_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">kd_matpel</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('kd_matpel') is-invalid @enderror" type="text" name="kd_matpel" value=" {{ old('kd_matpel', $nilai->kd_matpel) }}">
                            @error('kd_matpel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">nm_matpel</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nm_matpel') is-invalid @enderror" type="text" name="nm_matpel" value=" {{ old('nm_matpel', $nilai->nm_matpel) }}">
                            @error('nm_matpel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">uts_sem_ganjil</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('uts_sem_ganjil') is-invalid @enderror" type="text" name="uts_sem_ganjil" value=" {{ old('uts_sem_ganjil', $nilai->uts_sem_ganjil) }}">
                            @error('uts_sem_ganjil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">uas_sem_ganjil</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('uas_sem_ganjil') is-invalid @enderror" type="text" name="uas_sem_ganjil" value=" {{ old('uas_sem_ganjil', $nilai->uas_sem_ganjil) }}">
                            @error('uas_sem_ganjil')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">uts_sem_genap</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('uts_sem_genap') is-invalid @enderror" type="text" name="uts_sem_genap" value=" {{ old('uts_sem_genap', $nilai->uts_sem_genap) }}">
                            @error('uts_sem_genap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">uas_sem_genap</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('uas_sem_genap') is-invalid @enderror" type="text" name="uas_sem_genap" value=" {{ old('uas_sem_genap', $nilai->uas_sem_genap) }}">
                            @error('uas_sem_genap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/nilai">Kembali</a>
                        <button class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection