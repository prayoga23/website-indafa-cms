<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    public function index()
    {
        // Ambil data terbaru dengan pagination (6 data per halaman agar cocok dengan grid HTML)
        $photos = PhotoGallery::latest('activity_date')->paginate(6);
        return view('admin.gallery.photo', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Batas maksimal 2MB
            'activity_date' => 'required|date',
        ]);

        // Proses Penyimpanan File Foto ke folder storage/app/public/gallery
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('gallery', $filename, 'public');
        }

        PhotoGallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image_path' => $path,
            'activity_date' => $request->activity_date,
        ]);

        return redirect()->back()->with('success', 'Foto dokumentasi berhasil ditambahkan ke galeri!');
    }

    public function destroy(PhotoGallery $photo)
    {
        // Hapus file fisik gambar dari local storage sebelum menghapus row database
        if (Storage::disk('public')->exists($photo->image_path)) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $photo->delete();
        return redirect()->back()->with('success', 'Foto dokumentasi berhasil dihapus!');
    }
}
