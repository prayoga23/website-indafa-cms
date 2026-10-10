<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeMessageController extends Controller
{
    // Halaman Utama/Index Sambutan di Backend Admin
    public function index()
    {
        // Mengambil data pertama. Jika belum ada, akan mengembalikan null
        $welcome = WelcomeMessage::first();

        return view('admin.beranda.sambutan', compact('welcome'));
    }

    // Proses Create atau Update (Menggunakan updateOrCreate)
    public function update(Request $request)
    {
        $request->validate([
            'kaprodi_name'   => 'required|string|max:255',
            'kaprodi_title'  => 'required|string|max:255',
            'kaprodi_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'quote'          => 'required|string',
            'welcome_text_1' => 'required|string',
            'welcome_text_2' => 'nullable|string',
            'profile_link'   => 'nullable|string',
            'contact_link'   => 'nullable|string',
        ]);

        $welcome = WelcomeMessage::first();
        $data = $request->except('kaprodi_image');

        // Manajemen Upload Foto Kaprodi
        if ($request->hasFile('kaprodi_image')) {
            // Jika ada foto lama, hapus dari storage
            if ($welcome && $welcome->kaprodi_image) {
                Storage::disk('public')->delete($welcome->kaprodi_image);
            }
            // Simpan foto baru ke folder 'public/welcome'
            $data['kaprodi_image'] = $request->file('kaprodi_image')->store('welcome', 'public');
        }

        // Kunci utama single row: paksa ID selalu 1
        WelcomeMessage::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->route('admin.sambutan.index')->with('success', 'Sambutan Ketua Prodi berhasil diperbarui!');
    }
}
