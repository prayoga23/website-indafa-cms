<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Str;
use App\Http\Requests\StudyProgramRequest;
use Illuminate\Support\Facades\Storage;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $studyPrograms = StudyProgram::with('faculty')
        ->latest()
        ->paginate(10);

    return view(
        'admin.study-programs.index',
        compact('studyPrograms')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $faculties = Faculty::orderBy('name')
        ->get();

    return view(
        'admin.study-programs.create',
        compact('faculties')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(
    StudyProgramRequest $request
)
{
    $logo = null;

    if ($request->hasFile('logo')) {

        $logo = $request->file('logo')
            ->store(
                'study-programs',
                'public'
            );
    }

    StudyProgram::create([
        'faculty_id' => $request->faculty_id,

        'name' => $request->name,

        'slug' => Str::slug($request->name),

        'degree' => $request->degree,

        'accreditation' => $request->accreditation,

        'head_of_program' => $request->head_of_program,

        'logo' => $logo,

        'vision' => $request->vision,

        'mission' => $request->mission,

        'description' => $request->description,
    ]);

    return redirect()
        ->route('admin.study-programs.index')
        ->with(
            'success',
            'Program studi berhasil ditambahkan'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyProgram $studyProgram)
    {
        $faculties = Faculty::orderBy('name')->get();

    return view(
        'admin.study-programs.edit',
        compact(
            'studyProgram',
            'faculties'
        )
    );
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(
    StudyProgramRequest $request,
    StudyProgram $studyProgram
)
{
    $logo = $studyProgram->logo;

    if ($request->hasFile('logo')) {

        if ($studyProgram->logo) {

            Storage::disk('public')
                ->delete($studyProgram->logo);
        }

        $logo = $request->file('logo')
            ->store('study-programs', 'public');
    }

    $studyProgram->update([

        'faculty_id' => $request->faculty_id,

        'name' => $request->name,

        'slug' => Str::slug($request->name),

        'degree' => $request->degree,

        'accreditation' => $request->accreditation,

        'head_of_program' => $request->head_of_program,

        'logo' => $logo,

        'vision' => $request->vision,

        'mission' => $request->mission,

        'description' => $request->description,
    ]);

    return redirect()
        ->route('admin.study-programs.index')
        ->with(
            'success',
            'Program Studi berhasil diperbarui'
        );
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(
    StudyProgram $studyProgram
)
{
    if ($studyProgram->logo) {

        Storage::disk('public')
            ->delete($studyProgram->logo);
    }

    $studyProgram->delete();

    return redirect()
        ->route('admin.study-programs.index')
        ->with(
            'success',
            'Program Studi berhasil dihapus'
        );
}
}
