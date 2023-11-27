@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
<div class="container">
    <div class="my-3 d-grid">
        <a class="btn btn-danger" href="/auth/logout">Logout</a>
    </div>
    <form class="card my-3" action="/guru" method="GET">
        <div class="card-body d-flex justify-content-between gap-3">
            <div class="w-100">
                <input type="search" class="form-control" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Cari nama guru...">
            </div>
            <button class="rounded btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    <div class="my-4 card">
        <div class="card-header fs-4 text-center">Data Guru</div>
        <div class="card-body d-flex flex-column gap-3">
            <a class="btn btn-primary" href="/guru/create">Input Data Guru</a>
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
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Kode Mata Pelajaran</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($gurus) <= 0)
                        <tr>
                            <td class="fs-5 text-center" colspan="11">Data Guru Kosong</td>
                        </tr>
                    @else
                        @foreach($gurus as $index => $guru)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $guru->nip }}</td>
                                <td>{{ $guru->nm_guru }}</td>
                                <td>{{ $guru->tmp_lahir_guru }}</td>
                                <td>{{ $guru->tgl_lahir_guru }}</td>
                                <td>{{ $guru->jkel_guru == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $guru->alamat }}</td>
                                <td>{{ $guru->telp }}</td>
                                <td>{{ $guru->kd_matpel }}</td>
                                <td>{{ $guru->nm_matpel }}</td>
                                <td class="text-center">
                                    <a href="/guru/{{ $guru->nip }}/edit" class="btn btn-warning">Edit</a>
                                    || 
                                    <form class="d-inline" action="/guru/{{ $guru->nip }}" method="post" onsubmit="return confirm('Yakin menghapus data guru &quot;{{ $guru->nm_guru }}&quot;?');">
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
            {{ $gurus->links() }}
        </div>
    </div>
</div>
@endsection