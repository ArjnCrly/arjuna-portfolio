<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController
{
    public function index()
    {
        $educations = Education::orderBy('sort_order', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.educations.index', [
            'educations' => $educations,
        ]);
    }

    public function create()
    {
        return view('admin.educations.form', [
            'education' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'period' => 'required',
        ]);

        Education::create([
            'period' => trim((string)$request->input('period')),
            'institution' => trim((string)$request->input('institution')),
            'degree' => trim((string)$request->input('degree')),
            'location' => trim((string)$request->input('location')),
            'description' => trim((string)$request->input('description')),
            'highlights' => trim((string)$request->input('highlights')),
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/educations')->with('success', 'Riwayat pendidikan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('admin.educations.form', [
            'education' => $education,
        ]);
    }

    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);

        $education->update([
            'period' => trim((string)$request->input('period')),
            'institution' => trim((string)$request->input('institution')),
            'degree' => trim((string)$request->input('degree')),
            'location' => trim((string)$request->input('location')),
            'description' => trim((string)$request->input('description')),
            'highlights' => trim((string)$request->input('highlights')),
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/educations')->with('success', 'Riwayat pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect('/admin/educations')->with('success', 'Riwayat pendidikan berhasil dihapus.');
    }
}
