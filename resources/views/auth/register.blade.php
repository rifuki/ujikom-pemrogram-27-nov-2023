@extends('layouts.app')

@section('title', 'Register Auth User')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Register</div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('auth.signup') }}" method="POST">
                    @csrf
                    @method("POST")

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Username</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" value=" {{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Password</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-md-3">Nama</label> 
                        <div class="col-md-9">
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value=" {{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3" >
                        <button class="btn btn-primary">Daftar</button>
                    </div>

                    <div class="row text-center">
                        <span>Sudah punya akun? login
                            <a href="/auth/login">disini</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection