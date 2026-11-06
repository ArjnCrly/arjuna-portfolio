<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileSetting;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;

class DashboardController
{
    public function index()
    {
        $profile = ProfileSetting::first();
        $stats = [
            'projects' => Project::count(),
            'work_exp' => Experience::where('type', 'work')->count(),
            'org_exp' => Experience::where('type', 'organization')->count(),
            'educations' => Education::count(),
            'skills' => Skill::count(),
            'unread_messages' => ContactMessage::where('is_read', 0)->count(),
            'total_messages' => ContactMessage::count(),
        ];

        $recentProjects = Project::orderBy('sort_order', 'ASC')->limit(4)->get();
        $recentMessages = ContactMessage::orderBy('id', 'DESC')->limit(5)->get();

        return view('admin.dashboard', [
            'profile' => $profile,
            'stats' => $stats,
            'recentProjects' => $recentProjects,
            'recentMessages' => $recentMessages,
        ]);
    }
}
