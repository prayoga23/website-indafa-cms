<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $banners = Banner::with(['faculty', 'studyProgram'])->latest()->paginate(10);

    return view(
        'admin.banners.index',
        compact('banners')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $faculties = Faculty::all();
    $studyPrograms = StudyProgram::all();

    return view('admin.banners.create', compact('faculties', 'studyPrograms'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(BannerRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('image')) {

        $data['image'] = $request
            ->file('image')
            ->store('banners', 'public');
    }

    Banner::create($data);

    return redirect()
        ->route('admin.banners.index')
        ->with('success', 'Banner berhasil dibuat');
}

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
{
    return view(
        'admin.banners.show',
        compact('banner')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Banner $banner)
{
    $faculties = Faculty::all();
    $studyPrograms = StudyProgram::all();

    return view(
        'admin.banners.edit',
        compact('banner', 'faculties', 'studyPrograms')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(
    BannerRequest $request,
    Banner $banner
) {

    $data = $request->validated();

    if ($request->hasFile('image')) {

        if (
            $banner->image &&
            Storage::disk('public')->exists($banner->image)
        ) {
            Storage::disk('public')
                ->delete($banner->image);
        }

        $data['image'] = $request
            ->file('image')
            ->store('banners', 'public');
    }

    $banner->update($data);

    return redirect()
        ->route('admin.banners.index')
        ->with('success', 'Banner berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
{
    if (
        $banner->image &&
        Storage::disk('public')->exists($banner->image)
    ) {

        Storage::disk('public')
            ->delete($banner->image);
    }

    $banner->delete();

    return back()
        ->with('success', 'Banner berhasil dihapus');
}
}
