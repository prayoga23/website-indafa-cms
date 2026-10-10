<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use App\Models\Lecturer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LecturerRequest;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with(['faculty','studyProgram'])
            ->latest()
            ->paginate(10);

        return view('admin.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $studyPrograms = StudyProgram::all();

        return view('admin.lecturers.create', compact('faculties','studyPrograms'));
    }

    public function store(LecturerRequest $request)
    {
        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')
                ->store('lecturers', 'public');
        }

        Lecturer::create([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,
            'name' => $request->name,
            'nidn' => $request->nidn,
            'position' => $request->position,
            'education' => $request->education,
            'photo' => $photo,
            'bio' => $request->bio,
            'is_active' => true
        ]);

        return redirect()
            ->route('admin.lecturers.index')
            ->with('success','Dosen berhasil ditambahkan');
    }

    public function edit(Lecturer $lecturer)
    {
        $faculties = Faculty::all();
        $studyPrograms = StudyProgram::all();

        return view('admin.lecturers.edit', compact('lecturer','faculties','studyPrograms'));
    }

    public function update(LecturerRequest $request, Lecturer $lecturer)
    {
        $photo = $lecturer->photo;

        if ($request->hasFile('photo')) {

            if ($lecturer->photo) {
                Storage::disk('public')->delete($lecturer->photo);
            }

            $photo = $request->file('photo')
                ->store('lecturers','public');
        }

        $lecturer->update([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,
            'name' => $request->name,
            'nidn' => $request->nidn,
            'position' => $request->position,
            'education' => $request->education,
            'photo' => $photo,
            'bio' => $request->bio,
        ]);

        return redirect()
            ->route('admin.lecturers.index')
            ->with('success','Dosen berhasil diupdate');
    }

    public function destroy(Lecturer $lecturer)
    {
        if ($lecturer->photo) {
            Storage::disk('public')->delete($lecturer->photo);
        }

        $lecturer->delete();

        return back()->with('success','Dosen berhasil dihapus');
    }
}
