<?php

namespace App\Http\Controllers;

use App\Models\Reports; 
use Illuminate\Http\Request;
use App\Models\Companie;
use App\Models\ProblemType;
use App\Models\Admin; // Kalau model user admin namanya Admin


class ReportsController extends Controller 
{
    public function index()
{
    $reports = reports::with(['problemType', 'reporter', 'handler', 'company'])->get();
    return view('pages.reports.index', compact('reports'));
}

public function show($id)
    {
        // Cari laporan berdasarkan ID
        $report = Reports::findOrFail($id);

        // Mengembalikan view dengan data laporan
        return view('reports.show', compact('report'));
    }


    public function create()
{
    $companies = Companie::all();
    $problemTypes = ProblemType::all();
    $admins = Admin::all();

    return view('pages.reports.create', compact('companies', 'problemTypes', 'admins'));
}
    public function store(Request $request)
{
    $validated = $request->validate([
    'tanggal_open'     => ['required', 'date'],
    'problem_type_id'  => ['required', 'exists:problem_types,id'],
    'report_by_id'     => ['required', 'exists:admins,id'],
    'company_id'       => ['required', 'exists:companies,id'],
    'detail_problem'   => ['required', 'string'],
    'handle_by_id'     => ['required', 'exists:admins,id'],
    'status'           => ['required', 'in:open,in_progress,closed'],
    'detail_solution'  => ['nullable', 'string'],
    'tanggal_close'    => ['nullable', 'date'],
    ]);

    Reports::create($validated);

    return redirect()->route('reports.index')->with('success', 'berhasil disimpan.');
}




public function edit($id)
{
    $report = Reports::findOrFail($id); // Menggunakan nama variabel $report

    return view('pages.reports.edit', compact('report')); // Menggunakan 'report' di compact
}

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_open'     => ['required', 'date'],
            'problem_type'     => ['required', 'string', 'max:100'],
            'report_by'        => ['required', 'string', 'max:100'],
            'company'          => ['required', 'string', 'max:100'],
            'detail_problem'   => ['required', 'string'],
            'handle_by'        => ['required', 'string', 'max:100'],
            'status'           => ['required', 'in:open,in_progress,closed'],
            'detail_solution'  => ['nullable', 'string'],
            'tanggal_close'    => ['nullable', 'date'],
        ]);
    
        Reports::findOrFail($id)->update($validated);
    
        return redirect()->route('reports.index')->with('success', 'berhasil mengubah data.');
    }

    public function destroy($id)
    {
        $reports = Reports::findOrFail($id);
        $reports->delete();

        return redirect()->route('reports.index')->with('success', 'Data berhasil dihapus.');
    }

}