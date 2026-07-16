<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model akademik
use App\Models\CurriculumInfo;
use App\Models\Course;
use App\Models\GraduateLearningOutcome;
use App\Models\AcademicCalendar;
use App\Models\AcademicSetting;
use App\Models\AcademicGuidebook;
use App\Models\AcademicProcedureStep;
use App\Models\CourseSchedule;
use App\Models\ExamSchedule;
use App\Models\ThesisDefenseSchedule;
use App\Models\Page;

class AkademikController extends Controller
{
    public function kurikulum()
    {
        // 1. Ambil teks deskripsi pengantar kurikulum
        $curriculumInfo = CurriculumInfo::first();

        // 2. Ambil seluruh mata kuliah, urutkan berdasarkan semester dan nama
        // lalu kelompokkan berdasarkan 'semester'
        $semesters = Course::orderBy('semester', 'asc')
                           ->orderBy('code', 'asc')
                           ->get()
                           ->groupBy('semester');

        return view('frontend.akademik.kurikulum', compact('curriculumInfo', 'semesters'));
    }
    public function cpl()
    {
        // Mengambil data CPL yang dikelompokkan langsung berdasarkan kategori
        $cplGroups = GraduateLearningOutcome::orderBy('order_position', 'asc')
                                            ->get()
                                            ->groupBy('category');

        return view('frontend.akademik.cpl', compact('cplGroups'));
    }
    public function kalender()
    {
        // 1. Ambil data agenda perkuliahan dan kelompokkan berdasarkan tipe semester (ganjil/genap)
        $calendarGroups = AcademicCalendar::orderBy('order_position', 'asc')
                                          ->get()
                                          ->groupBy('semester_type');

        // 2. Ambil dokumen PDF Kalender Akademik resmi dari tabel setting
        $academicSetting = AcademicSetting::first();

        return view('frontend.akademik.kalender', compact('calendarGroups', 'academicSetting'));
    }
    public function panduan()
    {
        // 1. Ambil semua buku pedoman utama
        $guidebooks = AcademicGuidebook::all();

        // 2. Ambil data alur prosedur penting dan kelompokkan berdasarkan flow_type (misal: 'krs' dan 'skripsi')
        $procedures = AcademicProcedureStep::orderBy('step_number', 'asc')
                                            ->get()
                                            ->groupBy('flow_type');

        return view('frontend.akademik.panduan', compact('guidebooks', 'procedures'));
    }
    public function jadwal()
    {
        // 1. Ambil jadwal kuliah dan kelompokkan berdasarkan nama hari
        $courseSchedules = CourseSchedule::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")
                                          ->get()
                                          ->groupBy('day');
        // 2. Ambil semua jadwal ujian terbaru
        $examSchedules = ExamSchedule::orderBy('exam_date', 'asc')->get();

        // 3. Ambil semua jadwal seminar & sidang munaqasyah
        $defenseSchedules = ThesisDefenseSchedule::orderBy('event_date', 'asc')->get();

        return view('frontend.akademik.jadwal', compact('courseSchedules', 'examSchedules', 'defenseSchedules'));
    }

    /**
     * Halaman Filosofi Logo
     */
    public function filosofiLogo()
    {
        $page = Page::where('slug', 'filosofi-logo')->where('status', 'publish')->first();
        return view('frontend.akademik.filosofi-logo', compact('page'));
    }

    /**
     * Halaman Penelitian & Pengabdian
     */
    public function penelitian()
    {
        $page = Page::where('slug', 'penelitian')->where('status', 'publish')->first();
        return view('frontend.akademik.penelitian', compact('page'));
    }

    /**
     * Halaman PMB (Penerimaan Mahasiswa Baru)
     */
    public function pmb()
    {
        $page = Page::where('slug', 'pmb')->where('status', 'publish')->first();
        return view('frontend.akademik.pmb', compact('page'));
    }

    /**
     * Halaman Prestasi Mahasiswa
     */
    public function prestasi()
    {
        $page = Page::where('slug', 'prestasi')->where('status', 'publish')->first();
        return view('frontend.akademik.prestasi', compact('page'));
    }

    /**
     * Halaman Gallery INDAFA
     */
    public function galleryIndafa()
    {
        $page = Page::where('slug', 'gallery-indafa')->where('status', 'publish')->first();
        return view('frontend.akademik.gallery-indafa', compact('page'));
    }
}
