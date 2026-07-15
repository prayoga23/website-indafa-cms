<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseSchedule;
use App\Models\ExamSchedule;
use App\Models\ThesisDefenseSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $courses = CourseSchedule::orderByRaw("FIELD(day, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu')")->get();
        $exams = ExamSchedule::orderBy('exam_date', 'asc')->get();
        $defenses = ThesisDefenseSchedule::orderBy('event_date', 'asc')->get();

        return view('admin.schedule.index', compact('courses', 'exams', 'defenses'));
    }

    public function storeCourse(Request $request)
    {
        $data = $request->validate([
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'time_range' => 'required|string',
            'subject_name' => 'required|string',
            'lecturer_name' => 'required|string',
            'room' => 'required|string',
            'semester_level' => 'required|string',
        ]);

        CourseSchedule::create($data);
        return redirect()->back()->with('success', 'Jadwal kuliah berhasil ditambahkan!');
    }

    public function storeExam(Request $request)
    {
        $data = $request->validate([
            'exam_date' => 'required|date',
            'exam_day' => 'required|string',
            'time_range' => 'required|string',
            'subject_name' => 'required|string',
            'room' => 'required|string',
        ]);

        ExamSchedule::create($data);
        return redirect()->back()->with('success', 'Jadwal ujian berhasil ditambahkan!');
    }

    public function storeDefense(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:seminar proposal,sidang munaqasyah',
            'event_date' => 'required|date',
            'time' => 'required|string',
            'thesis_title' => 'required|string',
            'student_name' => 'required|string',
            'student_nim' => 'required|string',
            'room' => 'required|string',
        ]);

        ThesisDefenseSchedule::create($data);
        return redirect()->back()->with('success', 'Jadwal seminar/sidang berhasil diperbarui!');
    }

    public function destroyCourse(CourseSchedule $course) { $course->delete(); return redirect()->back()->with('success', 'Jadwal dihapus!'); }
    public function destroyExam(ExamSchedule $exam) { $exam->delete(); return redirect()->back()->with('success', 'Jadwal dihapus!'); }
    public function destroyDefense(ThesisDefenseSchedule $defense) { $defense->delete(); return redirect()->back()->with('success', 'Jadwal dihapus!'); }
}
