@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update</h1>
</div>

<div class="row">
    <div class="col-lg-10">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('reports.update', $report->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menentukan bahwa ini adalah request PUT untuk update -->
                    <div class="form-group">
                        <label for="tanggal_open">Tanggal Open</label>
                        <input type="date" name="tanggal_open" id="tanggal_open" class="form-control" value="{{ old('tanggal_open', $report->tanggal_open) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="problem_type">Problem Type</label>
                        <input type="text" name="problem_type" id="problem_type" class="form-control" value="{{ old('problem_type', $report->problem_type) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="report_by">Report By</label>
                        <input type="text" name="report_by" id="report_by" class="form-control" value="{{ old('report_by', $report->report_by) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $report->company) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="detail_problem">Detail Problem</label>
                        <textarea name="detail_problem" id="detail_problem" class="form-control" required>{{ old('detail_problem', $report->detail_problem) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="handle_by">Handle By</label>
                        <input type="text" name="handle_by" id="handle_by" class="form-control" value="{{ old('handle_by', $report->handle_by) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="open" {{ old('status', $report->status) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="in_progress" {{ old('status', $report->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="closed" {{ old('status', $report->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail_solution">Detail Solution</label>
                        <textarea name="detail_solution" id="detail_solution" class="form-control">{{ old('detail_solution', $report->detail_solution) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_close">Tanggal Close</label>
                        <input type="date" name="tanggal_close" id="tanggal_close" class="form-control" value="{{ old('tanggal_close', $report->tanggal_close) }}">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
