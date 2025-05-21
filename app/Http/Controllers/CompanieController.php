<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    public function index()
    {
        $companies = companie::all();
        return view('pages.companie.index', compact('companies'));
    }

    public function create()
    {
        $companies = Companie::all();
        return view('pages.companie.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'alamat'          => ['nullable', 'string', 'max:255'],
            'telepon'         => ['nullable', 'string', 'max:20'],
            'email'           => ['nullable', 'email', 'max:100'],
            'website'         => ['nullable', 'string', 'max:100'],
        ]);

        Companie::create($validated);

        return redirect()->route('companies.index')->with('success', 'Data perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $company = Companie::findOrFail($id);
        return view('pages.companie.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'alamat'          => ['nullable', 'string', 'max:255'],
            'telepon'         => ['nullable', 'string', 'max:20'],
            'email'           => ['nullable', 'email', 'max:100'],
            'website'         => ['nullable', 'string', 'max:100'],
        ]);

        Companie::findOrFail($id)->update($validated);

        return redirect()->route('companies.index')->with('success', 'Data perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $company = Companie::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Data perusahaan berhasil dihapus.');
    }
}
