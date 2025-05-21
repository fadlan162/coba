<?php

namespace App\Http\Controllers;

use App\Models\ProblemType;
use Illuminate\Http\Request;

class ProblemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problemTypes = ProblemType::latest()->paginate(10);
       return view('pages.problem.index', compact('problemTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.problem.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kode_problem' => 'required|string|unique:problem_types,kode_problem|max:20',
            'kategori' => 'required|string|max:50',
            'nama_problem' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        ProblemType::create($validatedData);

        return redirect()->route('pages.problem.index')->with('success', 'Jenis problem berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProblemType $problemType)
    {
        return view('pages.problem.show', compact('problemType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProblemType $problemType)
    {
        return view('pages.problem.edit', compact('problemType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProblemType $problemType)
    {
        $validatedData = $request->validate([
            'kode_problem' => 'required|string|max:20|unique:problem_types,kode_problem,' . $problemType->id,
            'kategori' => 'required|string|max:50',
            'nama_problem' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
        ]);

        $problemType->update($validatedData);

        return redirect()->route('pages.problem.index')->with('success', 'Jenis problem berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProblemType $problemType)
    {
        $problemType->delete();

        return redirect()->route('pages.problem.index')->with('success', 'Jenis problem berhasil dihapus.');
    }

    public function admin()
    {
        // Kamu bisa mengembalikan view tertentu atau melakukan logika yang diperlukan
        return view('problem-types.admin');
    }
}
