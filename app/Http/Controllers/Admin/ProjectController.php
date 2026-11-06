<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'ASC')->orderBy('id', 'ASC')->get();
        return view('admin.projects.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('admin.projects.form', [
            'project' => null,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'role' => 'required',
            'short_description' => 'required',
        ]);

        $title = trim((string)$request->input('title'));
        $slug = trim((string)$request->input('slug'));
        if ($slug === '') {
            $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title)) . '-' . mt_rand(10, 99);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file && $file->isValid()) {
                $ext = $file->getClientOriginalExtension() ?: 'png';
                $filename = 'proj_' . time() . '_' . mt_rand(100, 999) . '.' . $ext;
                $file->move(public_path('uploads/projects'), $filename);
                $imagePath = 'uploads/projects/' . $filename;
            }
        }

        Project::create([
            'slug' => $slug,
            'title' => $title,
            'client' => trim((string)$request->input('client')),
            'role' => trim((string)$request->input('role')),
            'period' => trim((string)$request->input('period')),
            'category' => trim((string)$request->input('category', 'Fullstack & Laravel')),
            'tech_stack' => trim((string)$request->input('tech_stack')),
            'short_description' => trim((string)$request->input('short_description')),
            'full_description' => trim((string)$request->input('full_description')),
            'key_features' => trim((string)$request->input('key_features')),
            'metrics_highlight' => trim((string)$request->input('metrics_highlight')),
            'image' => $imagePath,
            'preview_theme' => trim((string)$request->input('preview_theme', 'emerald')),
            'live_url' => trim((string)$request->input('live_url')),
            'repo_url' => trim((string)$request->input('repo_url')),
            'figma_url' => trim((string)$request->input('figma_url')),
            'is_featured' => $request->input('is_featured') ? 1 : 0,
            'sort_order' => (int)$request->input('sort_order', 1),
        ]);

        return redirect('/admin/projects')->with('success', 'Projek portofolio baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.form', [
            'project' => $project,
        ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $title = trim((string)$request->input('title'));
        $slug = trim((string)$request->input('slug'));
        if ($slug === '') {
            $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $title));
        }

        $data = [
            'slug' => $slug,
            'title' => $title,
            'client' => trim((string)$request->input('client')),
            'role' => trim((string)$request->input('role')),
            'period' => trim((string)$request->input('period')),
            'category' => trim((string)$request->input('category', 'Fullstack & Laravel')),
            'tech_stack' => trim((string)$request->input('tech_stack')),
            'short_description' => trim((string)$request->input('short_description')),
            'full_description' => trim((string)$request->input('full_description')),
            'key_features' => trim((string)$request->input('key_features')),
            'metrics_highlight' => trim((string)$request->input('metrics_highlight')),
            'preview_theme' => trim((string)$request->input('preview_theme', 'emerald')),
            'live_url' => trim((string)$request->input('live_url')),
            'repo_url' => trim((string)$request->input('repo_url')),
            'figma_url' => trim((string)$request->input('figma_url')),
            'is_featured' => $request->input('is_featured') ? 1 : 0,
            'sort_order' => (int)$request->input('sort_order', 1),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file && $file->isValid()) {
                $ext = $file->getClientOriginalExtension() ?: 'png';
                $filename = 'proj_' . time() . '_' . mt_rand(100, 999) . '.' . $ext;
                $file->move(public_path('uploads/projects'), $filename);
                $data['image'] = 'uploads/projects/' . $filename;
            }
        }

        $project->update($data);

        return redirect('/admin/projects')->with('success', 'Projek portofolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/admin/projects')->with('success', 'Projek berhasil dihapus.');
    }
}
