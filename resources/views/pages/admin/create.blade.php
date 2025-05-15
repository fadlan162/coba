@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Admin</h3>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
