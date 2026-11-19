<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Public Portfolio Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.home');
Route::get('/arjuna-photo.png', function () {
    header('Location: /assets/arjuna.png', true, 302);
    exit;
})->name('portfolio.photo.png');

Route::get('/arjuna-photo.jpg', function () {
    header('Location: /assets/arjuna.jpg', true, 302);
    exit;

})->name('portfolio.photo');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('portfolio.projects');
Route::get('/projects/{slug}', [PortfolioController::class, 'showProject'])->name('portfolio.project.show');
Route::post('/contact', [PortfolioController::class, 'storeContact'])->name('portfolio.contact.store');
Route::get('/api/profile', [PortfolioController::class, 'apiProfile'])->name('portfolio.api');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Protected Admin CMS Routes (Update Portofolio Berkala)
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 1. Biodata & Profil Arjuna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

    // 2. CRUD Pengalaman Kerja & Organisasi
    Route::get('/experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('admin.experiences.create');
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
    Route::get('/experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('admin.experiences.edit');
    Route::put('/experiences/{id}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');

    // 3. CRUD Pendidikan
    Route::get('/educations', [EducationController::class, 'index'])->name('admin.educations.index');
    Route::get('/educations/create', [EducationController::class, 'create'])->name('admin.educations.create');
    Route::post('/educations', [EducationController::class, 'store'])->name('admin.educations.store');
    Route::get('/educations/{id}/edit', [EducationController::class, 'edit'])->name('admin.educations.edit');
    Route::put('/educations/{id}', [EducationController::class, 'update'])->name('admin.educations.update');
    Route::delete('/educations/{id}', [EducationController::class, 'destroy'])->name('admin.educations.destroy');

    // 4. CRUD Projek Portofolio
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // 5. CRUD Keahlian / Tech Stack
    Route::get('/skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('admin.skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('/skills/{id}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::put('/skills/{id}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    // 6. Kotak Masuk Pesan Kontak
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::patch('/messages/{id}/read', [MessageController::class, 'toggleRead'])->name('admin.messages.read');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');
});
