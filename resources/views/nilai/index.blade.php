@extends('layouts.app')

@section('title', 'Data nilai')

@section('content')
<div class="container">
    <div class="my-4 card">
        <div class="card-header fs-4 text-center">Data nilai</div>
        <div class="card-body d-flex flex-column gap-3">
            <a class="btn btn-primary" href="/nilai/create">Input Data nilai</a>
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
                        <th scope="col">Kode Nilai</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nama Matpel</th>
                        <th scope="col">UTS S Ganjil</th>
                        <th scope="col">UTS S Genap</th>
                        <th scope="col">UAS S Ganjil</th>
                        <th scope="col">UAS S Genap</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($nilais) <= 0)
                        <tr>
                            <td class="fs-5 text-center" colspan="11">Data nilai Kosong</td>
                        </tr>
                    @else
                        @foreach($nilais as $index => $nilai)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $nilai->kd_nilai }}</td>
                                <td>{{ $nilai->nis }}</td>
                                <td>{{ $nilai->nm_siswa }}</td>
                                <td>{{ $nilai->nm_matpel }}</td>
                                <td>{{ $nilai->uts_sem_ganjil }}</td>
                                <td>{{ $nilai->uts_sem_genap }}</td>
                                <td>{{ $nilai->uas_sem_ganjil }}</td>
                                <td>{{ $nilai->uas_sem_genap }}</td>
                                <td class="text-center">
                                    <a href="/nilai/{{ $nilai->kd_nilai }}/edit" class="btn btn-warning">Edit</a>
                                    || 
                                    <form class="d-inline" action="/nilai/{{ $nilai->kd_nilai }}" method="post" onsubmit="return confirm('Yakin menghapus data nilai dari &quot;{{ $nilai->nm_siswa }}&quot;?');">
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
        </div>
    </div>
</div>
@endsection