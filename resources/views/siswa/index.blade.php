@extends('layouts.app')

@section('title', 'Data siswa')

@section('content')
<div class="container">
    <div class="my-3 d-grid">
        <a class="btn btn-danger" href="/auth/logout">Logout</a>
    </div>
    <form class="card my-3" action="/siswa" method="GET">
        <div class="card-body d-flex justify-content-between gap-3">
            <div class="w-100">
                <input type="search" class="form-control" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Cari nama siswa...">
            </div>
            <button class="rounded btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <div class="my-4 card">
        <div class="card-header fs-4 text-center">Data siswa</div>
        <div class="card-body d-flex flex-column gap-3">
            <a class="btn btn-primary" href="/siswa/create">Input Data siswa</a>
            @if(Session::has('success'))
                <div class="alert alert-success text-center fs-4 fw-bold">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('failed'))
                <div class="alert alert-danger text-center fs-4 fw-bold">
                    {{ Session::get('danger') }}
                </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama siswa</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Nama Wali</th>
                        <th scope="col">Kode Kelas</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($siswas) <= 0)
                        <tr>
                            <td class="fs-5 text-center" colspan="11">Data Siswa Kosong</td>
                        </tr>
                    @else
                        @foreach($siswas as $index => $siswa)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nm_siswa }}</td>
                                <td>{{ $siswa->tmp_lahir}}</td>
                                <td>{{ $siswa->tgl_lahir}}</td>
                                <td>{{ $siswa->jkel== 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->telp }}</td>
                                <td>{{ $siswa->nm_wali }}</td>
                                <td>{{ $siswa->kd_kelas }}</td>
                                <td>{{ $siswa->username }}</td>
                                <td>{{ $siswa->password }}</td>
                                <td class="text-center">
                                    <a href="/siswa/{{ $siswa->nis }}/edit" class="btn btn-warning">Edit</a>
                                    || 
                                    <form class="d-inline" action="/siswa/{{ $siswa->nis }}" method="post" onsubmit="return confirm('Yakin menghapus data siswa &quot;{{ $siswa->nm_siswa }}&quot;?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $siswas->links() }}
        </div>
    </div>
</div>
@endsection