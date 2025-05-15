@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if ($admins->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="5">
                                        <p class="pt-3 text-center">Tidak ada data admin</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($admins as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                         <form action="{{ route('reports.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ConfirmationDelete-{{ $item-> id}}">
                                                    <i class="fas fa-eraser"></i>
                                                </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
