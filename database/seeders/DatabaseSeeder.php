<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder\Seeder;
use App\Models\ProfileSetting;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ContactMessage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Profile Settings (Arjuna Carly Dhymas Mahendra)
        if (ProfileSetting::count() === 0) {
            ProfileSetting::create([
                'full_name' => 'Arjuna Carly Dhymas Mahendra',
                'short_name' => 'Arjuna Carly',
                'greeting_badge' => 'halo, selamat datang',
                'headline_role' => 'Web Developer — UI/UX, Frontend & Laravel Backend',
                'birth_place' => 'Sidoarjo',
                'birth_date' => '13 Desember 2004',
                'university' => 'Politeknik Negeri Malang',
                'department' => 'Jurusan Teknologi Informasi',
                'study_program' => 'D-IV Teknik Informatika',
                'location' => 'Sidoarjo & Malang, Jawa Timur, Indonesia',
                'availability_text' => 'tersedia untuk projek baru & frontend/UI-UX intern',
                'hero_bio' => 'Saya merancang antarmuka modern yang intuitif dan membangun aplikasi web yang cepat, responsif, serta terstruktur. Menggabungkan estetika UI/UX dengan arsitektur kode yang bersih.',
                'hero_sub_bio' => 'Mahasiswa Politeknik Negeri Malang Jurusan Teknologi Informasi (kelahiran Sidoarjo, 13 Desember 2004) dengan keahlian Web Developing end-to-end — mulai dari perancangan UI/UX di Figma, pengembangan Frontend interaktif dengan React, Tailwind CSS, JavaScript, & HTML/CSS, hingga arsitektur Backend handal berbasis PHP & Laravel.',
                'about_text' => 'Saya adalah mahasiswa D-IV Teknik Informatika di Politeknik Negeri Malang (Jurusan Teknologi Informasi) kelahiran Sidoarjo, 13 Desember 2004 yang berspesialisasi dalam Frontend Development dan UI/UX Design, serta memiliki pemahaman kuat tentang arsitektur backend berbasis Laravel. Berpengalaman memimpin tim sebagai Project Manager pada proyek Problem-Based Learning (PBL) dan berpengalaman mengerjakan proyek nyata, baik website profil laboratorium kampus (Applied Informatics Lab) maupun proyek mitra luar komersial (Hunian Lestari). Terbiasa merancang wireframe dan prototype interaktif menggunakan Figma, serta mengimplementasikannya menjadi antarmuka web menggunakan React, Tailwind CSS, JavaScript, PHP, dan HTML yang responsif, terstruktur, dan ramah pengguna.',
                'email' => 'arjuna.carly1304@gmail.com',
                'phone' => '082126908940',
                'whatsapp' => '6282126908940',
                'linkedin_url' => 'https://www.linkedin.com/in/arjunacarly',
                'linkedin_handle' => 'arjunacarly',
                'github_url' => 'https://github.com/arjunacarly',
                'github_handle' => 'arjunacarly',
                'instagram_url' => 'https://instagram.com/arjunacarly',
                'instagram_handle' => '@arjunacarly',
                'website_url' => 'https://hunianlestari.com',
                'avatar' => null,
            ]);
        }

        // 2. Seed Experiences (Pengalaman Kerja & Proyek Web + Pengalaman Organisasi & Kepanitiaan dari CV)
        if (Experience::count() === 0) {
            // A. PENGALAMAN KERJA & PROYEK WEB DEVELOPMENT
            Experience::create([
                'type' => 'work',
                'period' => 'Februari 2024 - Juni 2025',
                'company' => 'Proyek Kuliah Problem-Based Learning (PBL) — Polinema',
                'role' => 'Project Manager & Frontend Developer (2 Kali Masa Proyek)',
                'location' => 'Malang, Jawa Timur',
                'description' => "Memimpin koordinasi dan timeline kerja lintas divisi (UI/UX, Frontend, dan Backend) untuk 2 siklus proyek aplikasi web dan mobile berbasis metodologi Agile Scrum.\nMenyelaraskan kebutuhan pengguna ke dalam Software Requirement Specification (SRS) dan User Journey, memastikan deliverable selesai tepat waktu.\nTurut serta dalam penulisan slicing UI menggunakan React, Tailwind CSS, dan HTML/JS serta standardisasi komponen frontend agar konsisten dengan design system yang telah dibuat di Figma.",
                'tags' => 'Agile Scrum, Project Management, Figma, React, Tailwind CSS, Laravel, SRS',
                'link_url' => null,
                'sort_order' => 1,
            ]);

            Experience::create([
                'type' => 'work',
                'period' => 'September 2024 - Desember 2024',
                'company' => 'Laboratorium Applied Informatics (AI) — JTI Polinema',
                'role' => 'Frontend Developer & UI/UX Designer (Proyek Akademik)',
                'location' => 'Malang, Jawa Timur',
                'description' => "Merancang desain UI/UX website company profile lab riset Applied Informatics di Figma dengan tata letak modern, informatif, dan selaras dengan identitas akademik lab, mencakup 5 halaman utama.\nMengimplementasikan rancangan antarmuka menjadi kode frontend interaktif yang menyajikan katalog riset lab, showcase publikasi, profil dosen, dan formulir pengajuan izin lab, serta menghasilkan 5 fitur yang berfungsi.\nBekerja sama dengan tim developer dalam penataan integrasi komponen frontend dan pengujian cross-browser compatibility.",
                'tags' => 'Figma, UI/UX Design, Frontend Development, React, Tailwind CSS, JavaScript, HTML5/CSS3',
                'link_url' => null,
                'sort_order' => 2,
            ]);

            Experience::create([
                'type' => 'work',
                'period' => 'Februari 2024 - Agustus 2024',
                'company' => 'Proyek Mitra Luar — PT Prasetya Budi Lestari (hunianlestari.com)',
                'role' => 'UI/UX Designer & Fullstack/Frontend Developer',
                'location' => 'Sidoarjo / Jawa Timur',
                'description' => "Merancang arsitektur informasi, user flow, wireframe, dan prototype interaktif high-fidelity menggunakan Figma untuk platform pemasaran properti perumahan.\nMengembangkan frontend website responsif menggunakan HTML, CSS, JavaScript, dan Bootstrap untuk mengoptimalkan tampilan di perangkat mobile dan desktop serta meningkatkan skor responsivitas sebesar 90%.\nMengintegrasikan frontend dengan backend Laravel & PHP, mencakup dynamic catalog perumahan, form konsultasi/booking via WhatsApp API/Formspree, dan manajemen konten.\nMelakukan usability testing dan perbaikan UI secara berkala untuk meningkatkan retensi pengunjung dan kemudahan navigasi pengguna.",
                'tags' => 'Laravel, PHP, Figma, JavaScript, HTML5, CSS3, Bootstrap, WhatsApp API',
                'link_url' => 'https://hunianlestari.com',
                'sort_order' => 3,
            ]);

            // B. PENGALAMAN ORGANISASI & KEPANITIAAN
            Experience::create([
                'type' => 'organization',
                'period' => '2024 - Sekarang',
                'company' => 'Polinema E-Sports Community',
                'role' => 'Ketua Umum',
                'location' => 'Politeknik Negeri Malang',
                'description' => "Memimpin struktur organisasi resmi kampus yang menaungi ratusan anggota komunitas esports dan divisi kompetisi lintas game.\nMenyusun program kerja tahunan, mengelola anggaran operasional, serta membangun kemitraan strategis dengan pihak eksternal, sponsor, dan organisasi mahasiswa.",
                'tags' => 'Leadership, Strategic Partnership, Team Management, Event Directing',
                'link_url' => null,
                'sort_order' => 4,
            ]);

            Experience::create([
                'type' => 'organization',
                'period' => '2024 - 2025',
                'company' => 'Charity Mobile Legends Championship & PMCC Polinema',
                'role' => 'Ketua Pelaksana (Chief Organizer)',
                'location' => 'Politeknik Negeri Malang',
                'description' => "Menjadi Ketua Pelaksana event Charity Mobile Legends Championship, memimpin 30+ panitia, mengelola sistem registrasi peserta, bracket turnamen, dan penyaluran dana donasi.\nMenjadi Ketua Pelaksana Event PUBG Mobile Campus Championship (PMCC) Polinema 2025, mengoordinasikan teknis kompetisi, live streaming broadcast, dan publikasi promosi.",
                'tags' => 'Project Leadership, 30+ Crew Management, Broadcast & Tournament System',
                'link_url' => null,
                'sort_order' => 5,
            ]);

            Experience::create([
                'type' => 'organization',
                'period' => '2023 & 2024',
                'company' => 'Jogja Mobile Legends Championship',
                'role' => 'Volunteer / Event Crew',
                'location' => 'Yogyakarta',
                'description' => "Berpartisipasi aktif selama 2 tahun berturut-turut dalam operasional event regional, mencakup pengaturan registrasi pemain, validasi ID peserta, manajemen panggung, dan alur pertandingan.",
                'tags' => 'Event Operations, Stage Management, Player Administration',
                'link_url' => null,
                'sort_order' => 6,
            ]);
        }

        // 3. Seed Educations (Riwayat Akademik dari CV)
        if (Education::count() === 0) {
            Education::create([
                'period' => 'Agustus 2023 - Sekarang',
                'institution' => 'Politeknik Negeri Malang',
                'degree' => 'Jurusan Teknologi Informasi — D-IV Teknik Informatika',
                'location' => 'Malang, Jawa Timur',
                'description' => 'Fokus pada pengembangan perangkat lunak modern berbasis web, desain antarmuka pengguna (UI/UX), rekayasa sistem, basis data relasional, serta kepemimpinan proyek teknologi informasi berbasis Agile Scrum.',
                'highlights' => 'Pemrograman Berbasis Web, Desain Antarmuka Pengguna (UI/UX), Rekayasa Perangkat Lunak, Basis Data, Manajemen Proyek TI',
                'sort_order' => 1,
            ]);

            Education::create([
                'period' => 'Juli 2020 - Juni 2023',
                'institution' => 'SMA Muhammadiyah 2 Sidoarjo',
                'degree' => 'MIPA (Matematika dan Ilmu Pengetahuan Alam)',
                'location' => 'Sidoarjo, Jawa Timur',
                'description' => 'Menempuh pendidikan menengah atas di Sidoarjo dengan penekanan pada logika matematika, sains analitis, pemecahan masalah terstruktur, serta aktif dalam kegiatan organisasi dan kompetisi.',
                'highlights' => 'Matematika & Logika Analitis, Dasar Teknologi Informasi, Kolaborasi Tim',
                'sort_order' => 2,
            ]);
        }

        // 4. Seed Projects (Hasil Karya Terpilih dari CV & Keahlian Prompt)
        if (Project::count() === 0) {
            Project::create([
                'slug' => 'hunian-lestari-property-platform',
                'title' => 'Hunian Lestari (hunianlestari.com)',
                'client' => 'PT Prasetya Budi Lestari',
                'role' => 'UI/UX Designer & Fullstack/Frontend Developer',
                'period' => 'Feb 2024 - Agu 2024',
                'category' => 'Fullstack & Laravel',
                'tech_stack' => 'Laravel, PHP, Figma, JavaScript, HTML5, CSS3, Bootstrap, MySQL, WhatsApp API',
                'short_description' => 'Platform web pemasaran properti perumahan komersial dengan fitur dynamic catalog unit hunian, form konsultasi/booking terintegrasi WhatsApp API & Formspree, serta peningkatan skor responsivitas hingga 90%.',
                'full_description' => "Hunian Lestari (hunianlestari.com) adalah platform pemasaran properti perumahan milik PT Prasetya Budi Lestari yang dirancang untuk memudahkan calon pembeli menjelajahi katalog tipe hunian, spesifikasi bangunan, lokasi strategis, dan melakukan booking/konsultasi secara instan.\n\nDalam proyek mitra luar komersial ini, saya menangani proses pengembangan dari hulu ke hilir: dimulai dari riset arsitektur informasi, perancangan user flow, wireframe, hingga high-fidelity interactive prototype di Figma. Selanjutnya saya mengimplementasikan kode frontend yang responsif serta mengintegrasikannya dengan backend berbasis Laravel untuk pengelolaan katalog properti dinamis.",
                'key_features' => "Perancangan Arsitektur Informasi, Wireframe & High-Fidelity Prototype di Figma\nDynamic Catalog Perumahan & manajemen konten terintegrasi Backend Laravel\nOptimasi responsivitas lintas perangkat (Mobile & Desktop) dengan peningkatan skor 90%\nIntegrasi sistem Formulir Konsultasi & Booking langsung via WhatsApp API / Formspree\nIterasi UI/UX berkala berbasis Usability Testing untuk meningkatkan retensi pengunjung",
                'metrics_highlight' => '+90% Skor Responsivitas',
                'image' => null,
                'preview_theme' => 'emerald',
                'live_url' => 'https://hunianlestari.com',
                'repo_url' => 'https://github.com/arjunacarly',
                'figma_url' => 'https://figma.com',
                'is_featured' => 1,
                'sort_order' => 1,
            ]);

            Project::create([
                'slug' => 'company-profile-lab-applied-informatics',
                'title' => 'Web Profile Laboratorium Applied Informatics (AI)',
                'client' => 'Jurusan Teknologi Informasi — Polinema',
                'role' => 'Frontend Developer & UI/UX Designer',
                'period' => 'Sep 2024 - Des 2024',
                'category' => 'Frontend & UI/UX',
                'tech_stack' => 'Figma, React, Tailwind CSS, JavaScript (ES6+), HTML5, CSS3, Git',
                'short_description' => 'Website company profile resmi untuk Laboratorium Riset Applied Informatics JTI Polinema yang mencakup 5 halaman modern serta 5 fitur interaktif mulai dari katalog riset, publikasi, hingga pengajuan izin lab.',
                'full_description' => "Proyek pengembangan website profil resmi Laboratorium Applied Informatics (AI) di Jurusan Teknologi Informasi Politeknik Negeri Malang. Proyek ini bertujuan memodernisasi citra digital laboratorium riset sekaligus mendigitalisasi akses informasi riset dosen/mahasiswa dan administrasi peminjaman fasilitas lab.\n\nSaya merancang tata letak UI/UX modern di Figma yang selaras dengan identitas akademik JTI Polinema untuk 5 halaman utama, kemudian menerjemahkannya menjadi komponen frontend interaktif menggunakan teknologi web modern (React, Tailwind CSS, JavaScript, HTML5/CSS3) dengan kompatibilitas lintas peramban (cross-browser compatibility).",
                'key_features' => "Desain UI/UX eksklusif 5 halaman di Figma sesuai identitas akademik Lab AI Polinema\nKatalog Riset Laboratorium & Showcase Publikasi Ilmiah interaktif\nDirektori Profil Dosen Peneliti & Anggota Laboratorium\nFormulir Digital Pengajuan Izin Pemakaian Laboratorium\nPengujian Cross-Browser Compatibility & penataan komponen frontend terstandarisasi",
                'metrics_highlight' => '5 Halaman & 5 Fitur Utama',
                'image' => null,
                'preview_theme' => 'indigo',
                'live_url' => null,
                'repo_url' => 'https://github.com/arjunacarly',
                'figma_url' => 'https://figma.com',
                'is_featured' => 1,
                'sort_order' => 2,
            ]);

            Project::create([
                'slug' => 'pbl-agile-web-mobile-polinema',
                'title' => 'Ekosistem Aplikasi Web & Mobile PBL Polinema',
                'client' => 'Program Problem-Based Learning — JTI Polinema',
                'role' => 'Project Manager & Frontend Developer (2 Siklus)',
                'period' => 'Feb 2024 - Jun 2025',
                'category' => 'Project Management & Frontend',
                'tech_stack' => 'React, Tailwind CSS, Laravel, Figma Design System, JavaScript, PHP, Agile Scrum',
                'short_description' => 'Kepemimpinan manajemen proyek lintas divisi (UI/UX, Frontend, Backend) dan pengembangan antarmuka berbasis Design System Figma untuk 2 siklus proyek aplikasi web dan mobile dengan metodologi Agile Scrum.',
                'full_description' => "Melalui program Problem-Based Learning (PBL) di Politeknik Negeri Malang selama 2 masa proyek berturut-turut, saya dipercaya memegang peran ganda sebagai Project Manager sekaligus Frontend Developer.\n\nDari sisi manajemen produk, saya menyusun dokumen Software Requirement Specification (SRS), memetakan User Journey, dan memimpin sprint Agile Scrum lintas divisi. Dari sisi teknis, saya turut membangun design system di Figma serta melakukan slicing komponen UI menggunakan React, Tailwind CSS, dan integrasi dengan arsitektur Laravel.",
                'key_features' => "Manajemen timeline & sprint Agile Scrum lintas divisi (UI/UX, Frontend, Backend) selama 2 siklus\nPenyusunan dokumen Software Requirement Specification (SRS) & pemetaan User Journey\nPembuatan Design System terpusat di Figma untuk konsistensi komponen antarmuka\nSlicing UI & standardisasi komponen Frontend dengan React, Tailwind CSS, dan Blade Laravel",
                'metrics_highlight' => '2 Siklus Proyek Agile Scrum',
                'image' => null,
                'preview_theme' => 'cyan',
                'live_url' => null,
                'repo_url' => 'https://github.com/arjunacarly',
                'figma_url' => 'https://figma.com',
                'is_featured' => 1,
                'sort_order' => 3,
            ]);

            Project::create([
                'slug' => 'arjuna-dynamic-laravel-cms-portfolio',
                'title' => 'Arjuna Studio — Dynamic Laravel Portfolio & CMS',
                'client' => 'Personal Branding & Open Portfolio System',
                'role' => 'Fullstack Web Developer & UI/UX Architect',
                'period' => '2026',
                'category' => 'Fullstack & Laravel',
                'tech_stack' => 'Laravel, PHP, Tailwind CSS, React / Interactive JS, Figma, SQLite / MySQL',
                'short_description' => 'Website portofolio interaktif bergaya Developer Blueprint & Terminal dengan Dashboard Admin CMS berbasis Laravel MVC untuk memperbarui projek, pengalaman, pendidikan, dan skill secara berkala.',
                'full_description' => "Dirancang khusus agar dapat diperbarui secara berkala tanpa harus menyentuh kode sumber, website portofolio ini menggabungkan estetika minimalis developer-terminal dengan interaksi UI/UX modern.\n\nDibangun di atas arsitektur MVC Framework Laravel, dilengkapi fitur Interactive Terminal CLI, Live UI/UX Theme Token Switcher, filter projek dinamis, serta halaman Dashboard Admin terlindungi untuk mengelola seluruh entitas portofolio secara real-time.",
                'key_features' => "Dashboard Admin CMS Laravel penuh (CRUD Projek, Pengalaman, Pendidikan, Keahlian, Biodata & Pesan)\nInteractive Multi-Tab Developer Terminal & UI/UX Design Token Inspector\nMode Tema Ganda (Dark Obsidian & Clean Light Blueprint) + kustomisasi warna aksen instan\nHalaman Direktori Semua Projek (/projects) dengan filter kategori & halaman detail studi kasus",
                'metrics_highlight' => 'Full Dynamic Laravel CMS',
                'image' => null,
                'preview_theme' => 'amber',
                'live_url' => '/',
                'repo_url' => 'https://github.com/arjunacarly',
                'figma_url' => 'https://figma.com',
                'is_featured' => 1,
                'sort_order' => 4,
            ]);
        }

        // 5. Seed Skills (Keahlian dari Prompt: Figma, React, Tailwind, Laravel, JS, PHP, HTML + CV Lengkap)
        if (Skill::count() === 0) {
            $skills = [
                // 1. UI/UX Design
                ['uiux', 'ui/ux design & prototyping', 'Figma', 'Utama', 'Wireframing, High-Fidelity Prototyping & Interactive UI', 1, 1],
                ['uiux', 'ui/ux design & prototyping', 'Design System', 'Mahir', 'Standardisasi komponen UI, tipografi & color tokens', 1, 2],
                ['uiux', 'ui/ux design & prototyping', 'Wireframing & User Flow', 'Mahir', 'Perancangan arsitektur informasi & user journey map', 0, 3],
                ['uiux', 'ui/ux design & prototyping', 'Usability Testing', 'Mahir', 'Evaluasi pengalaman pengguna & iterasi perbaikan antarmuka', 0, 4],

                // 2. Frontend Development
                ['frontend', 'frontend development', 'React', 'Utama', 'Component-based UI, state management & SPA interaktif', 1, 5],
                ['frontend', 'frontend development', 'Tailwind CSS', 'Utama', 'Utility-first styling, responsive layout & dark mode design', 1, 6],
                ['frontend', 'frontend development', 'JavaScript (ES6+)', 'Utama', 'DOM manipulation, async/await, Fetch API & interaktivitas modern', 1, 7],
                ['frontend', 'frontend development', 'HTML5 & CSS3', 'Utama', 'Semantic markup, modern CSS Grid/Flexbox & animasi web', 1, 8],
                ['frontend', 'frontend development', 'Bootstrap', 'Mahir', 'Pengembangan layout responsif cepat lintas perangkat', 0, 9],

                // 3. Framework & Backend Development
                ['backend', 'backend & framework', 'Laravel', 'Utama', 'Arsitektur MVC, Blade Templating, Routing, Eloquent ORM & Auth', 1, 10],
                ['backend', 'backend & framework', 'PHP', 'Utama', 'Pemrograman server-side, OOP & integrasi bisnis logika backend', 1, 11],
                ['backend', 'backend & framework', 'REST API & WhatsApp API', 'Mahir', 'Integrasi layanan pihak ketiga, Formspree & komunikasi data', 0, 12],

                // 4. Database & Tools
                ['database_tools', 'database, tools & creative', 'MySQL', 'Mahir', 'Perancangan skema relasional & optimasi query database', 0, 13],
                ['database_tools', 'database, tools & creative', 'PostgreSQL', 'Menengah', 'Manajemen basis data relasional untuk aplikasi skala menengah', 0, 14],
                ['database_tools', 'database, tools & creative', 'Git & GitHub', 'Mahir', 'Version control, kolaborasi tim developer & manajemen cabang kode', 0, 15],
                ['database_tools', 'database, tools & creative', 'VS Code', 'Utama', 'Code editor utama dengan workflow debugging & ekstensi produktif', 0, 16],
                ['database_tools', 'database, tools & creative', 'CapCut Creative', 'Mahir', 'Video Editing untuk Shorts/Reels & kampanye promosi digital', 0, 17],

                // 5. Project Management & Soft Skills
                ['soft_skills', 'project management & soft skills', 'Agile / Scrum & SRS', 'Utama', 'Penyusunan SRS, sprint planning, Trello/Notion & task delegation', 1, 18],
                ['soft_skills', 'project management & soft skills', 'Leadership & Project Management', 'Utama', 'Ketua Umum Polinema E-Sports & PM 2 siklus proyek PBL', 0, 19],
                ['soft_skills', 'project management & soft skills', 'Komunikasi & Kolaborasi Tim', 'Utama', 'Koordinasi lintas divisi UI/UX, Frontend, dan Backend', 0, 20],
                ['soft_skills', 'project management & soft skills', 'Problem Solving & Analytical', 'Mahir', 'Pemecahan masalah teknis & analisis kebutuhan pengguna', 0, 21],
                ['soft_skills', 'project management & soft skills', 'User Empathy & Pixel-Perfect', 'Mahir', 'Attention to detail tinggi dalam implementasi desain ke kode', 0, 22],

                // 6. Bahasa
                ['languages', 'bahasa komunikasi', 'Bahasa Indonesia', 'Aktif / Fluent', 'Komunikasi profesional lisan maupun tulisan tingkat lanjut', 0, 23],
                ['languages', 'bahasa komunikasi', 'Bahasa Inggris', 'Intermediate', 'Pemahaman dokumentasi teknis pemrograman & bahasa kerja', 0, 24],
            ];

            foreach ($skills as $s) {
                Skill::create([
                    'category_slug' => $s[0],
                    'category_label' => $s[1],
                    'name' => $s[2],
                    'level_badge' => $s[3],
                    'description' => $s[4],
                    'is_highlighted' => $s[5],
                    'sort_order' => $s[6],
                ]);
            }
        }

        // 6. Seed Sample Contact Message
        if (ContactMessage::count() === 0) {
            ContactMessage::create([
                'name' => 'Tim Rekrutmen & Kolaborator',
                'email' => 'hr@partner-tech.id',
                'subject' => 'Tawaran Kolaborasi Frontend & UI/UX Project',
                'message' => 'Halo Arjuna! Kami terkesan dengan portofolio Hunian Lestari dan desain UI/UX Lab Applied Informatics Polinema. Mari berdiskusi untuk kolaborasi proyek web berikutnya.',
                'is_read' => 0,
            ]);
        }
    }
}
