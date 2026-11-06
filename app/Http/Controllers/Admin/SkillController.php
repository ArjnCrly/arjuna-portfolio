<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.skills.index', [
            'skills' => $skills,
        ]);
    }

    public function create()
    {
        return view('admin.skills.form', [
            'skill' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_label' => 'required',
        ]);

        Skill::create([
            'category_slug' => trim((string)$request->input('category_slug', 'frontend')),
            'category_label' => trim((string)$request->input('category_label')),
            'name' => trim((string)$request->input('name')),
            'level_badge' => trim((string)$request->input('level_badge', 'Mahir')),
            'description' => trim((string)$request->input('description')),
            'is_highlighted' => $request->input('is_highlighted') ? 1 : 0,
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/skills')->with('success', 'Keahlian / Skill berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.form', [
            'skill' => $skill,
        ]);
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->update([
            'category_slug' => trim((string)$request->input('category_slug', 'frontend')),
            'category_label' => trim((string)$request->input('category_label')),
            'name' => trim((string)$request->input('name')),
            'level_badge' => trim((string)$request->input('level_badge', 'Mahir')),
            'description' => trim((string)$request->input('description')),
            'is_highlighted' => $request->input('is_highlighted') ? 1 : 0,
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/skills')->with('success', 'Data keahlian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect('/admin/skills')->with('success', 'Data keahlian berhasil dihapus.');
    }
}
