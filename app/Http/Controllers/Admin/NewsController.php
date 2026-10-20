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
        // Validasi jika ada upload error dari PHP (misal upload_max_filesize)
        if ($request->file('thumbnail') && !$request->file('thumbnail')->isValid()) {
            $errorCode = $request->file('thumbnail')->getError();
            $errorMsg = match ($errorCode) {
                UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Ukuran file gambar melebihi batas upload server. Silakan gunakan file gambar dengan ukuran di bawah 5 MB.',
                UPLOAD_ERR_PARTIAL => 'File gambar hanya terunggah sebagian. Silakan coba lagi.',
                default => 'Terjadi kendala saat mengunggah gambar (Kode: ' . $errorCode . ').',
            };
            return back()->withInput()->withErrors(['thumbnail' => $errorMsg]);
        }

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('news', 'public');

            // Pastikan berkas tersalin jika symlink belum aktif sempurna
            $dest = public_path('storage/' . $thumbnail);
            if (!file_exists($dest)) {
                $dir = dirname($dest);
                if (!is_dir($dir)) {
                    @mkdir($dir, 0755, true);
                }
                @copy(storage_path('app/public/' . $thumbnail), $dest);
            }
        }

        // Generate slug unik agar tidak error saat judul sama
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        News::create([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,
            'user_id' => auth()->id(),

            'title' => $request->title,
            'slug' => $slug,

            'thumbnail' => $thumbnail,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dibuat');
    }

    public function edit(News $news)
    {
        $faculties = Faculty::all();
        $studyPrograms = StudyProgram::all();

        return view('admin.news.edit', compact('news', 'faculties', 'studyPrograms'));
    }

    public function update(NewsRequest $request, News $news)
    {
        // Validasi jika ada upload error dari PHP (misal upload_max_filesize)
        if ($request->file('thumbnail') && !$request->file('thumbnail')->isValid()) {
            $errorCode = $request->file('thumbnail')->getError();
            $errorMsg = match ($errorCode) {
                UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Ukuran file gambar melebihi batas upload server. Silakan gunakan file gambar dengan ukuran di bawah 5 MB.',
                UPLOAD_ERR_PARTIAL => 'File gambar hanya terunggah sebagian. Silakan coba lagi.',
                default => 'Terjadi kendala saat mengunggah gambar (Kode: ' . $errorCode . ').',
            };
            return back()->withInput()->withErrors(['thumbnail' => $errorMsg]);
        }

        $thumbnail = $news->thumbnail;

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail) {
                Storage::disk('public')->delete($news->thumbnail);
                if (file_exists(public_path('storage/' . $news->thumbnail)) && !is_link(public_path('storage'))) {
                    @unlink(public_path('storage/' . $news->thumbnail));
                }
            }

            $thumbnail = $request->file('thumbnail')
                ->store('news', 'public');

            // Pastikan berkas tersalin jika symlink belum aktif sempurna
            $dest = public_path('storage/' . $thumbnail);
            if (!file_exists($dest)) {
                $dir = dirname($dest);
                if (!is_dir($dir)) {
                    @mkdir($dir, 0755, true);
                }
                @copy(storage_path('app/public/' . $thumbnail), $dest);
            }
        }

        // Generate slug unik saat update
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (News::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $news->update([
            'faculty_id' => $request->faculty_id,
            'study_program_id' => $request->study_program_id,

            'title' => $request->title,
            'slug' => $slug,

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
