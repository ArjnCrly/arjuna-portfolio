<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Tabel Profile Settings (Biodata, Hero, Kontak & Tentang Saya)
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('short_name');
            $table->string('greeting_badge')->default('halo, selamat datang');
            $table->string('headline_role');
            $table->string('birth_place')->default('Sidoarjo');
            $table->string('birth_date')->default('13 Desember 2004');
            $table->string('university')->default('Politeknik Negeri Malang');
            $table->string('department')->default('Jurusan Teknologi Informasi');
            $table->string('study_program')->default('D-IV Teknik Informatika');
            $table->string('location')->default('Sidoarjo & Malang, Jawa Timur');
            $table->string('availability_text')->default('tersedia untuk projek web, UI/UX & internship');
            $table->text('hero_bio');
            $table->text('hero_sub_bio');
            $table->text('about_text');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('linkedin_url');
            $table->string('linkedin_handle');
            $table->string('github_url');
            $table->string('github_handle');
            $table->string('instagram_url')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('website_url')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Experiences (Pengalaman Kerja & Organisasi/Kepanitiaan)
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('work'); // work | organization
            $table->string('period');
            $table->string('company');
            $table->string('role');
            $table->string('location')->nullable();
            $table->text('description'); // Poin-poin pencapaian dipisahkan baris baru (\n)
            $table->string('tags')->nullable(); // Comma-separated tech/skill tags
            $table->string('link_url')->nullable();
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // 3. Tabel Educations (Riwayat Akademik)
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->string('institution');
            $table->string('degree');
            $table->string('location')->nullable();
            $table->text('description');
            $table->text('highlights')->nullable(); // Mata kuliah / fokus relevan
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // 4. Tabel Projects (Karya & Studi Kasus Portofolio)
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('client')->nullable();
            $table->string('role');
            $table->string('period')->nullable();
            $table->string('category')->default('Fullstack & Laravel');
            $table->text('tech_stack'); // Comma-separated
            $table->text('short_description');
            $table->text('full_description');
            $table->text('key_features')->nullable(); // Newline-separated
            $table->string('metrics_highlight')->nullable();
            $table->string('image')->nullable();
            $table->string('preview_theme')->default('emerald'); // emerald | indigo | amber | cyan | rose
            $table->string('live_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('figma_url')->nullable();
            $table->boolean('is_featured')->default(1);
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // 5. Tabel Skills (Spesialisasi, Tech Stack, Soft Skills & Bahasa)
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('category_slug'); // uiux | frontend | backend | database_tools | soft_skills | languages
            $table->string('category_label');
            $table->string('name');
            $table->string('level_badge')->default('Mahir');
            $table->string('description')->nullable();
            $table->boolean('is_highlighted')->default(0);
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        // 6. Tabel Contact Messages (Kotak Masuk Pesan Pengunjung)
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_settings');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('contact_messages');
    }
};
