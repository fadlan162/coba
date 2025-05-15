<!-- resources/views/pages/companie/create.blade.php -->
@extends('layouts.app') <!-- Gantilah ini dengan layout yang digunakan di aplikasi Anda -->

@section('content')
    <div class="container">
        <h2>Create New Company</h2>
        
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat">
            </div>
            
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" name="telepon" class="form-control" id="telepon">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control" id="website">
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
