@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Perusahaan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $company->nama_perusahaan) }}" class="form-control" required>
        </div>
    
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $company->alamat) }}</textarea>
        </div>
    
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon', $company->telepon) }}" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $company->email) }}" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" name="website" value="{{ old('website', $company->website) }}" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Batal</a>
    </form>    
</div>
@endsection
