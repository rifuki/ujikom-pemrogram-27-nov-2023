@extends('layouts.app')

@section('title', 'Edit Data Pembeli')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Data Pembeli</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        Gagal Mengedit Data Pembeli
                        {{-- <ul> --}}
                            {{-- @foreach($errors->all() as $error) --}}
                                {{-- <li>{{ $error }}</li> --}}
                            {{-- @endforeach --}}
                        </ul>
                    </div>
                @endif
                <form action="/pembeli/{{$pembeli->id_pembeli}}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama Pembeli</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nama_pembeli') is-invalid @enderror" type="text" name="nama_pembeli" value="{{ old('nama_pembeli', $pembeli->nama_pembeli) }}">
                            @error('nama_pembeli')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Jenis Kelamin</label> 
                        <div class="col-md-9 d-flex align-items-center gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="l" {{ ($pembeli->jk == 'l' || old('jk') == 'l') ? 'checked' : '' }}>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="p" {{ ($pembeli->jk == 'p' || old('jk') == 'p') ? 'checked' : '' }}>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Alamat</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" value="{{ old('alamat', $pembeli->alamat) }}">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">No Handphone</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('no_tlp') is-invalid @enderror" type="text" name="no_tlp" value="{{ old('no_tlp', $pembeli->no_tlp) }}">
                            @error('no_tlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/pembeli">Kembali</a>
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection