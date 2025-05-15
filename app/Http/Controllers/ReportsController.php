<?php

namespace App\Http\Controllers;

use App\Models\Reports; 
use Illuminate\Http\Request;

class ReportsController extends Controller 
{
    public function index()
    {
        $reports = Reports::all(); 

        return view('pages.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('pages.reports.create');
    }

    public function store(Request $request)
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