<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurriculumInfo;
use App\Models\Course;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    // Menampilkan halaman dashboard manajemen kurikulum prodi
    public function index()
    {
        $info = CurriculumInfo::first();

        // Mengelompokkan daftar mata kuliah berdasarkan semester secara otomatis
        $coursesGrouped = Course::orderBy('semester', 'asc')
            ->orderBy('code', 'asc')
            ->get()
            ->groupBy('semester');

        return view('admin.curriculum.index', compact('info', 'coursesGrouped'));
    }

    // Memperbarui Deskripsi/Teks Pengantar Kurikulum
    public function updateInfo(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        CurriculumInfo::updateOrCreate(['id' => 1], [
            'description' => $request->description
        ]);

        return redirect()->back()->with('success_info', 'Paragraf pengantar kurikulum berhasil disimpan!');
    }

    // Menambah Mata Kuliah Baru ke Semester Tertentu
    public function storeCourse(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer|min:1|max:8',
            'code'     => 'required|string|unique:courses,code|max:50',
            'name'     => 'required|string|max:255',
            'sks'      => 'required|integer|min:1|max:6',
            'type'     => 'required|string|max:50',
        ]);

        Course::create($request->all());

        return redirect()->back()->with('success_course', 'Mata kuliah baru berhasil ditambahkan!');
    }

    // Menghapus Mata Kuliah dari Kurikulum
    public function destroyCourse(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('success_course', 'Mata kuliah berhasil dihapus dari daftar!');
    }
}
