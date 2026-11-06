<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController
{
    public function index()
    {
        $experiences = Experience::orderBy('type', 'DESC')
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();

        return view('admin.experiences.index', [
            'experiences' => $experiences,
        ]);
    }

    public function create()
    {
        return view('admin.experiences.form', [
            'experience' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'period' => 'required',
        ]);

        Experience::create([
            'type' => trim((string)$request->input('type', 'work')),
            'period' => trim((string)$request->input('period')),
            'company' => trim((string)$request->input('company')),
            'role' => trim((string)$request->input('role')),
            'location' => trim((string)$request->input('location')),
            'description' => trim((string)$request->input('description')),
            'tags' => trim((string)$request->input('tags')),
            'link_url' => trim((string)$request->input('link_url')),
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/experiences')->with('success', 'Data pengalaman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experiences.form', [
            'experience' => $experience,
        ]);
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $experience->update([
            'type' => trim((string)$request->input('type', 'work')),
            'period' => trim((string)$request->input('period')),
            'company' => trim((string)$request->input('company')),
            'role' => trim((string)$request->input('role')),
            'location' => trim((string)$request->input('location')),
            'description' => trim((string)$request->input('description')),
            'tags' => trim((string)$request->input('tags')),
            'link_url' => trim((string)$request->input('link_url')),
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/experiences')->with('success', 'Data pengalaman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect('/admin/experiences')->with('success', 'Data pengalaman berhasil dihapus.');
    }
}
