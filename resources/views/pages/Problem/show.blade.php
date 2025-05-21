@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jenis Problem</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $problemType->id }}</td>
        </tr>
        <tr>
            <th>Kode Problem</th>
            <td>{{ $problemType->kode_problem }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $problemType->kategori }}</td>
        </tr>
        <tr>
            <th>Nama Problem</th>
            <td>{{ $problemType->nama_problem }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $problemType->deskripsi ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td>{{ $problemType->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        <tr>
            <th>Diupdate Pada</th>
            <td>{{ $problemType->updated_at->format('d-m-Y H:i') }}</td>
        </tr>
    </table>

    <a href="{{ route('problem-types.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('problem-types.edit', $problemType->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
