<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Semua Model Terkait Sesuai Rute Anda
use App\Models\Faculty;
use App\Models\StudyProgram;
use App\Models\Lecturer;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Agenda;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data untuk widget statistik
        $countFaculty = Faculty::count();
        $countStudyProgram = StudyProgram::count();
        $countLecturer = Lecturer::count();
        $countNews = News::count();
        $countAnnouncement = Announcement::count();
        $countAgenda = Agenda::count();
        $countMessage = ContactMessage::count();

        // Mengambil 5 pesan masuk/aspirasi terbaru dari masyarakat/mahasiswa
        $latestMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'countFaculty',
            'countStudyProgram',
            'countLecturer',
            'countNews',
            'countAnnouncement',
            'countAgenda',
            'countMessage',
            'latestMessages'
        ));
    }
}
