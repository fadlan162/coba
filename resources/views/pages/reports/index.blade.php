@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Problem Type</h1>
    <a href="/reports/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10"> {{-- Ukuran kolom bisa disesuaikan --}}
        <div class="card shadow ">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="card-body"> 
                        <table class="table table-bordered table-hover mx-auto" style="width: auto;">
                            <thead class="thead-light">
                                <tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Open</th>
                                        <th>Problem Type</th>
                                        <th>Report By</th>
                                        <th>Company</th>
                                        <th>Detail Problem</th>
                                        <th>Handle By</th>
                                        <th>Status</th>
                                        <th>Detail Solution</th>
                                        <th>Tanggal Close</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tr>
                            </thead>
                            @if (!empty($reports) && $reports->count() < 1)
                                <tbody>
                                    <tr>
                                        <td colspan="10">
                                            <p class="pt-3 text-center">Tidak ada data</p>
                                        </td>
                                    </tr>
                                </tbody>
                            @else
                            <tbody>
                                @foreach ($reports as $item)   
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal_open }}</td>
                                    <td>{{ $item->problemType->nama_problem ?? '-' }}</td>
                                    <td>{{ $item->reporter->name ?? '-' }}</td>
                                   <td>{{ $item->company->nama_perusahaan ?? '-' }}</td>
                                    <td>{{ $item->detail_problem }}</td>
                                    <td>{{ $item->handler->name ?? '-' }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->detail_solution ?? '-' }}</td>
                                    <td>{{ $item->tanggal_close ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('reports.edit', $item->id) }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                <i class="fas fa-pen"></i>    
                                            </a>
                                            <form action="{{ route('reports.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ConfirmationDelete-{{ $item-> id}}">
                                                    <i class="fas fa-eraser"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.reports.confirm-delete')
                                @endforeach
                            </tbody>
                            
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
