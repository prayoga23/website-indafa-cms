<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyRequest;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->paginate(10);

        return view('admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        return view('admin.faculties.create');
    }

    public function store(FacultyRequest $request)
    {
        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')
                ->store('faculties', 'public');
        }

        Faculty::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'dean' => $request->dean,
            'description' => $request->description,
            'logo' => $logo,
            'is_active' => true
        ]);

        return redirect()
            ->route('admin.faculties.index')
            ->with('success', 'Fakultas berhasil ditambahkan');
    }

    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(FacultyRequest $request, Faculty $faculty)
    {
        $logo = $faculty->logo;

        if ($request->hasFile('logo')) {

            if ($faculty->logo) {
                Storage::disk('public')
                    ->delete($faculty->logo);
            }

            $logo = $request->file('logo')
                ->store('faculties', 'public');
        }

        $faculty->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'dean' => $request->dean,
            'description' => $request->description,
            'logo' => $logo
        ]);

        return redirect()
            ->route('admin.faculties.index')
            ->with('success', 'Fakultas berhasil diupdate');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->logo) {
            Storage::disk('public')
                ->delete($faculty->logo);
        }

        $faculty->delete();

        return back()
            ->with('success', 'Fakultas berhasil dihapus');
    }
}
