<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import model terkait sejarah
use App\Models\HistoryInfo;
use App\Models\HistoryTimeline;
use App\Models\Vision;
use App\Models\VisionMissionItem;
use App\Models\OrganizationalStructure;
use App\Models\Lecturer;
class ProfilController extends Controller
{
    public function sejarah()
    {
        // Ambil data info/latar belakang pendirian prodi pertama
        $historyInfo = HistoryInfo::first();

        // Ambil semua data timeline diurutkan dari tahun terlama ke terbaru
        $timelines = HistoryTimeline::orderBy('year', 'asc')->get();

        // Lempar data ke view blade
        return view('frontend.profil.sejarah', compact('historyInfo', 'timelines'));
    }

    // Fungsi placeholder untuk halaman profil lainnya nanti
    public function visiMisi()
    {
        // 1. Ambil data teks visi utama
        $vision = Vision::first();

        // 2. Ambil data misi (filter type = mission, urutkan berdasarkan order_position)
        $missions = VisionMissionItem::where('type', 'mission')
                                     ->orderBy('order_position', 'asc')
                                     ->get();

        // 3. Ambil data tujuan (filter type = objective / sesuaikan dengan string yang Anda simpan di DB)
        $objectives = VisionMissionItem::where('type', 'objective')
                                       ->orderBy('order_position', 'asc')
                                       ->get();

        return view('frontend.profil.visi_misi', compact('vision', 'missions', 'objectives'));
    }

    public function struktur()
    {
        // 1. Ambil Pengelola Inti/Utama (Dekan, Kaprodi, Sekprodi, GKM)
        $managers = OrganizationalStructure::where('category', 'management')
                                           ->orderBy('order_position', 'asc')
                                           ->get();

        // 2. Ambil rumpun Dosen Utama & Staf Administrasi (Kartu kecil tanpa foto)
        $staffs = OrganizationalStructure::where('category', 'staff')
                                         ->orderBy('order_position', 'asc')
                                         ->get();

        return view('frontend.profil.struktur_organisasi', compact('managers', 'staffs'));
    }
    public function dosen()
    {
        // Mengambil semua dosen yang berstatus aktif
        $lecturers = Lecturer::where('is_active', 1)
                             ->orderBy('name', 'asc')
                             ->get();

        return view('frontend.profil.profil_dosen', compact('lecturers'));
    }
}
