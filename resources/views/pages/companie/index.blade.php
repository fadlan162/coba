@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Perusahaan</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('companie.create') }}" class="btn btn-primary mb-3">Tambah Perusahaan</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover mx-auto" style="width: auto;">
                <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->nama_perusahaan }}</td>
                        <td>{{ $company->alamat ?? '-' }}</td>
                        <td>{{ $company->telepon ?? '-' }}</td>
                        <td>{{ $company->email ?? '-' }}</td>
                        <td>{{ $company->website ?? '-' }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data perusahaan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
        
    
@endsection
