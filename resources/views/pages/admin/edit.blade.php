@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Admin</h3>

    <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $admin->name) }}">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $admin->email) }}">
        </div>

        <div class="form-group mb-3">
            <label for="profile_picture">Foto Profil</label>
            <input type="file" name="profile_picture" class="form-control-file">
            @if ($admin->profile_picture)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $admin->profile_picture) }}" alt="Foto Profil" width="80" class="rounded-circle">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
