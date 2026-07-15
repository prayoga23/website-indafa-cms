<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsRequest;
use App\Models\Faculty;
use App\Models\StudyProgram;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['faculty','studyProgram','user'])
            ->latest()
            ->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $studyPrograms = StudyProgram::all();

        return view('admin.news.create', compact('faculties','studyPrograms'));
    }

    public function store(NewsRequest $request)
    {
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('news','public');
        }

        News::create([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,
            'user_id' => auth()->id(),

            'title' => $request->title,
            'slug' => Str::slug($request->title),

            'thumbnail' => $thumbnail,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success','Berita berhasil dibuat');
    }

    public function edit(News $news)
    {
        $faculties = Faculty::all();
        $studyPrograms = StudyProgram::all();

        return view('admin.news.edit', compact('news','faculties','studyPrograms'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $thumbnail = $news->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if ($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
            }

            $thumbnail = $request->file('thumbnail')
                ->store('news','public');
        }

        $news->update([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,

            'title' => $request->title,
            'slug' => Str::slug($request->title),

            'thumbnail' => $thumbnail,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success','Berita berhasil diupdate');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return back()->with('success','Berita berhasil dihapus');
    }
    public function show($id)
{
    $news = News::findOrFail($id);

    return view('admin.news.show', compact('news'));
}
}
