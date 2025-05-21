@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis Problem</h1>

    <form action="{{ route('problem-types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode_problem" class="form-label">Kode Problem</label>
            <input type="text" name="kode_problem" id="kode_problem" class="form-control" value="{{ old('kode_problem') }}" required>
            @error('kode_problem') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" required>
            @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_problem" class="form-label">Nama Problem</label>
            <input type="text" name="nama_problem" id="nama_problem" class="form-control" value="{{ old('nama_problem') }}" required>
            @error('nama_problem') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('problem-types.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
