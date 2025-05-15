@extends('layouts.app')

@section('content')
<!-- Menampilkan pesan sukses -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Problem Type</h1>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-body">
                <form action="/reports/report" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="tanggal_open">Tanggal Open</label>
                        <input type="date" name="tanggal_open" class="form-control @error('tanggal_open') is-invalid @enderror" value="{{ old('tanggal_open') }}">
                        @error('tanggal_open')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="problem_type">Problem Type</label>
                        <input type="text" name="problem_type" class="form-control @error('problem_type') is-invalid @enderror" value="{{ old('problem_type') }}">
                        @error('problem_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="report_by">Report By</label>
                        <input type="text" name="report_by" class="form-control @error('report_by') is-invalid @enderror" value="{{ old('report_by') }}">
                        @error('report_by')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}">
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="detail_problem">Detail Problem</label>
                        <textarea name="detail_problem" class="form-control @error('detail_problem') is-invalid @enderror">{{ old('detail_problem') }}</textarea>
                        @error('detail_problem')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="handle_by">Handle By</label>
                        <input type="text" name="handle_by" class="form-control @error('handle_by') is-invalid @enderror" value="{{ old('handle_by') }}">
                        @error('handle_by')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="detail_solution">Detail Solution</label>
                        <textarea name="detail_solution" class="form-control @error('detail_solution') is-invalid @enderror">{{ old('detail_solution') }}</textarea>
                        @error('detail_solution')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_close">Tanggal Close</label>
                        <input type="date" name="tanggal_close" class="form-control @error('tanggal_close') is-invalid @enderror" value="{{ old('tanggal_close') }}">
                        @error('tanggal_close')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
