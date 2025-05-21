@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Laporan Masalah</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tanggal_open" class="form-label">Tanggal Open</label>
            <input type="date" name="tanggal_open" id="tanggal_open" class="form-control" value="{{ old('tanggal_open') }}" required>
        </div>

        <div class="mb-3">
            <label for="problem_type_id" class="form-label">Tipe Masalah</label>
            <select name="problem_type_id" id="problem_type_id" class="form-select" required>
                <option value="">-- Pilih Tipe Masalah --</option>
                @foreach($problemTypes as $type)
                    <option value="{{ $type->id }}" {{ old('problem_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->nama_problem }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="report_by_id" class="form-label">Report By (Pelapor)</label>
            <select name="report_by_id" id="report_by_id" class="form-select" required>
                <option value="">-- Pilih Pelapor --</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ old('report_by_id') == $admin->id ? 'selected' : '' }}>
                        {{ $admin->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <select name="company_id" id="company_id" class="form-select" required>
                <option value="">-- Pilih Perusahaan --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="detail_problem" class="form-label">Detail Problem</label>
            <textarea name="detail_problem" id="detail_problem" class="form-control" required>{{ old('detail_problem') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="handle_by_id" class="form-label">Handle By (Penanggung Jawab)</label>
            <select name="handle_by_id" id="handle_by_id" class="form-select" required>
                <option value="">-- Pilih Penanggung Jawab --</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ old('handle_by_id') == $admin->id ? 'selected' : '' }}>
                        {{ $admin->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="detail_solution" class="form-label">Detail Solution</label>
            <textarea name="detail_solution" id="detail_solution" class="form-control">{{ old('detail_solution') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_close" class="form-label">Tanggal Close</label>
            <input type="date" name="tanggal_close" id="tanggal_close" class="form-control" value="{{ old('tanggal_close') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
