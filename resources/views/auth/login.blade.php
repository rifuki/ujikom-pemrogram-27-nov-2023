@extends('layouts.app')

@section('title', 'Login Auth User')

@section('content')
<div class="container">
    <div class="m-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Login</div>
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
            @if(Session::has('success'))
                <div class="alert alert-success text-center fs-4 fw-bold">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('failed'))
                <div class="alert alert-danger text-center fs-4 fw-bold">
                    {{ Session::get('failed') }}
                </div>
            @endif
                <form action="{{ route('auth.signin') }}" method="POST">
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
                        <button class="btn btn-primary">Login</button>
                    </div>

                    <div class="row text-center">
                        <span>Pengguna baru? daftar
                            <a href="/auth/register">disini</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection