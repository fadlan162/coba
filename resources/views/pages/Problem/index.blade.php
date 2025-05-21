@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jenis Problem</h1>

    <a href="{{ route('problem-types.create') }}" class="btn btn-primary mb-3">Tambah Jenis Problem</a>
    <a href="{{ route('problem-types.admin') }}">Admin Problem Types</a>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Problem</th>
                <th>Kategori</th>
                <th>Nama Problem</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($problemTypes as $problemType)
            <tr>
                <td>{{ $problemType->id }}</td>
                <td>{{ $problemType->kode_problem }}</td>
                <td>{{ $problemType->kategori }}</td>
                <td>{{ $problemType->nama_problem }}</td>
                <td>
                    <a href="{{ route('problem-types.show', $problemType->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('problem-types.edit', $problemType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('problem-types.destroy', $problemType->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Data tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
