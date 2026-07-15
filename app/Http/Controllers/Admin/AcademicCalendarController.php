<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use App\Models\AcademicSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicCalendarController extends Controller
{
    // Menampilkan halaman dashboard manajemen kalender akademik
    public function index()
    {
        $agendas = AcademicCalendar::orderBy('order_position', 'asc')->get();

        $ganjilAgendas = $agendas->where('semester_type', 'ganjil');
        $genapAgendas  = $agendas->where('semester_type', 'genap');
        $setting       = AcademicSetting::first();

        return view('admin.calendar.index', compact('ganjilAgendas', 'genapAgendas', 'setting'));
    }

    // Menyimpan butir agenda kegiatan baru
    public function storeAgenda(Request $request)
    {
        $request->validate([
            'semester_type'  => 'required|in:ganjil,genap',
            'activity_name'  => 'required|string|max:255',
            'date_range'     => 'required|string|max:255',
            'color_class'    => 'nullable|string|max:50',
            'order_position' => 'required|integer|min:0',
        ]);

        AcademicCalendar::create($request->all());

        return redirect()->back()->with('success_agenda', 'Agenda akademik baru berhasil ditambahkan!');
    }

    // Mengunggah atau memperbarui file SK Dokumen PDF Resmi
    public function updatePdf(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:5120', // Batas maksimal berkas 5MB
        ]);

        $setting = AcademicSetting::firstOrNew(['id' => 1]);

        if ($request->hasFile('pdf_file')) {
            // Hapus berkas lama jika sebelumnya sudah ada
            if ($setting->pdf_file_path && Storage::disk('public')->exists($setting->pdf_file_path)) {
                Storage::disk('public')->delete($setting->pdf_file_path);
            }

            // Simpan berkas baru ke direktori storage/app/public/academic
            $path = $request->file('pdf_file')->store('academic', 'public');
            $setting->pdf_file_path = $path;
            $setting->save();
        }

        return redirect()->back()->with('success_pdf', 'Dokumen PDF Kalender Akademik berhasil diperbarui!');
    }

    // Menghapus agenda kegiatan akademis
    public function destroyAgenda(AcademicCalendar $calendar)
    {
        $calendar->delete();
        return redirect()->back()->with('success_agenda', 'Agenda akademik berhasil dihapus!');
    }
}
