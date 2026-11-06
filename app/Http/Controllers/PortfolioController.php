<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileSetting;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;

class PortfolioController
{
    public function index()
    {
        $profile = ProfileSetting::first();
        $workExperiences = Experience::where('type', 'work')
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();
        $orgExperiences = Experience::where('type', 'organization')
            ->orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();
        $educations = Education::orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();
        $projects = Project::orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();
        $skills = Skill::orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();

        // Group skills by category_label
        $groupedSkills = [];
        foreach ($skills as $skill) {
            $cat = $skill->category_label ?: 'lainnya';
            if (!isset($groupedSkills[$cat])) {
                $groupedSkills[$cat] = [];
            }
            $groupedSkills[$cat][] = $skill;
        }

        // Arjuna's Studio Transparent Cutout Photo Base64 for Instant 0ms Load
        $photoB64 = '';
        $b64CutoutFile = 'C:/Users/ASUS/.gemini/antigravity/brain/05bb87aa-5bb9-4ec1-93d2-8b0534e50f55/scratch/arjuna_cutout_b64.txt';
        $b64OrigFile = 'C:/Users/ASUS/.gemini/antigravity/brain/05bb87aa-5bb9-4ec1-93d2-8b0534e50f55/scratch/arjuna_base64.txt';
        if (file_exists($b64CutoutFile)) {
            $photoB64 = trim(file_get_contents($b64CutoutFile));
        } elseif (file_exists($b64OrigFile)) {
            $photoB64 = trim(file_get_contents($b64OrigFile));
        } else {
            $origImg = 'C:/Users/ASUS/.gemini/antigravity/brain/05bb87aa-5bb9-4ec1-93d2-8b0534e50f55/.user_uploaded/media_1793807075773_c68796ee.jpg';
            if (file_exists($origImg)) {
                $photoB64 = base64_encode(file_get_contents($origImg));
            }
        }

        return view('portfolio.index', [
            'profile' => $profile,
            'photoB64' => $photoB64,
            'workExperiences' => $workExperiences,
            'orgExperiences' => $orgExperiences,
            'educations' => $educations,
            'projects' => $projects,
            'skills' => $skills,
            'groupedSkills' => $groupedSkills,
        ]);
    }

    public function projects()
    {
        $profile = ProfileSetting::first();
        $projects = Project::orderBy('sort_order', 'ASC')
            ->orderBy('id', 'ASC')
            ->get();

        return view('portfolio.projects', [
            'profile' => $profile,
            'projects' => $projects,
        ]);
    }

    public function showProject($slug)
    {
        $profile = ProfileSetting::first();
        $project = Project::where('slug', $slug)->first();
        if (!$project) {
            $project = Project::find($slug);
        }
        if (!$project) {
            http_response_code(404);
            return "Projek tidak ditemukan.";
        }

        $otherProjects = Project::where('id', '!=', $project->id)
            ->orderBy('sort_order', 'ASC')
            ->limit(3)
            ->get();

        return view('portfolio.show', [
            'profile' => $profile,
            'project' => $project,
            'otherProjects' => $otherProjects,
        ]);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        ContactMessage::create([
            'name' => trim($request->input('name')),
            'email' => trim($request->input('email')),
            'subject' => trim($request->input('subject', 'Kolaborasi Projek / Portofolio')),
            'message' => trim($request->input('message')),
            'is_read' => 0,
        ]);

        return redirect('/#kontak')->with('success', 'Terima kasih! Pesan Anda berhasil dikirim ke Arjuna Carly.');
    }

    public function apiProfile()
    {
        $profile = ProfileSetting::first();
        return [
            'nama' => $profile->full_name ?? 'Arjuna Carly Dhymas Mahendra',
            'ttl' => ($profile->birth_place ?? 'Sidoarjo') . ', ' . ($profile->birth_date ?? '13 Desember 2004'),
            'kampus' => ($profile->university ?? 'Politeknik Negeri Malang') . ' - ' . ($profile->department ?? 'Jurusan Teknologi Informasi'),
            'peran' => 'Web Developer (UI/UX Figma, React, Tailwind CSS, Laravel)',
            'stack_utama' => ['Figma', 'React', 'Tailwind CSS', 'Laravel', 'JavaScript', 'PHP', 'HTML5/CSS3'],
            'status' => $profile->availability_text ?? 'aktif',
        ];
    }
}
