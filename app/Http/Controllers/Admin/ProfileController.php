<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProfileSetting;

class ProfileController
{
    public function edit()
    {
        $profile = ProfileSetting::first();
        return view('admin.profile.edit', [
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {
        $profile = ProfileSetting::first();
        if (!$profile) {
            $profile = new ProfileSetting();
        }

        $data = [
            'full_name' => trim((string)$request->input('full_name')),
            'short_name' => trim((string)$request->input('short_name')),
            'greeting_badge' => trim((string)$request->input('greeting_badge')),
            'headline_role' => trim((string)$request->input('headline_role')),
            'birth_place' => trim((string)$request->input('birth_place')),
            'birth_date' => trim((string)$request->input('birth_date')),
            'university' => trim((string)$request->input('university')),
            'department' => trim((string)$request->input('department')),
            'study_program' => trim((string)$request->input('study_program')),
            'location' => trim((string)$request->input('location')),
            'availability_text' => trim((string)$request->input('availability_text')),
            'hero_bio' => trim((string)$request->input('hero_bio')),
            'hero_sub_bio' => trim((string)$request->input('hero_sub_bio')),
            'about_text' => trim((string)$request->input('about_text')),
            'email' => trim((string)$request->input('email')),
            'phone' => trim((string)$request->input('phone')),
            'whatsapp' => trim((string)$request->input('whatsapp')),
            'linkedin_url' => trim((string)$request->input('linkedin_url')),
            'linkedin_handle' => trim((string)$request->input('linkedin_handle')),
            'github_url' => trim((string)$request->input('github_url')),
            'github_handle' => trim((string)$request->input('github_handle')),
            'instagram_url' => trim((string)$request->input('instagram_url')),
            'instagram_handle' => trim((string)$request->input('instagram_handle')),
            'website_url' => trim((string)$request->input('website_url')),
        ];

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($file && $file->isValid()) {
                $ext = $file->getClientOriginalExtension() ?: 'jpg';
                $filename = 'avatar_' . time() . '.' . $ext;
                $file->move(public_path('uploads/profile'), $filename);
                $data['avatar'] = 'uploads/profile/' . $filename;
            }
        }

        $profile->update($data);

        return redirect('/admin/profile')->with('success', 'Profil & Biodata Arjuna berhasil diperbarui!');
    }
}
