<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusStatistic;
use Illuminate\Http\Request;

class CampusStatisticController extends Controller
{
    // Menampilkan halaman form statistik saat ini
    public function index()
    {
        $statistic = CampusStatistic::first();
        return view('admin.statistic.index', compact('statistic'));
    }

    // Memperbarui atau membuat data statistik baru (jika masih kosong)
    public function update(Request $request)
    {
        $request->validate([
            'students_count'  => 'required|integer|min:0',
            'lecturers_count' => 'required|integer|min:0',
            'alumni_count'    => 'required|integer|min:0',
            'programs_count'  => 'required|integer|min:0',
        ]);

        // Mengunci ID pada baris pertama (ID: 1)
        CampusStatistic::updateOrCreate(
            ['id' => 1],
            [
                'students_count'  => $request->students_count,
                'lecturers_count' => $request->lecturers_count,
                'alumni_count'    => $request->alumni_count,
                'programs_count'  => $request->programs_count,
            ]
        );

        return redirect()->route('admin.statistic.index')->with('success', 'Statistik kampus berhasil diperbarui!');
    }
}
