<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryPhotoController extends Controller
{
    public function store(
        Request $request,
        Gallery $gallery
    ) {

        $request->validate([
            'images' => 'required',
            'images.*' => 'image|max:4096'
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store(
                'gallery-photos',
                'public'
            );

            GalleryPhoto::create([
                'gallery_id' => $gallery->id,
                'image' => $path,
            ]);
        }

        return back()->with(
            'success',
            'Foto berhasil diupload'
        );
    }

    public function destroy(
        GalleryPhoto $galleryPhoto
    ) {

        Storage::disk('public')
            ->delete($galleryPhoto->image);

        $galleryPhoto->delete();

        return back()->with(
            'success',
            'Foto berhasil dihapus'
        );
    }
}
