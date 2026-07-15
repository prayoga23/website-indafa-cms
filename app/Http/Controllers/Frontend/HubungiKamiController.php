<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Models\ContactMessage;

class HubungiKamiController extends Controller
{
    /**
     * Menampilkan Halaman Kontak Publik
     */
    public function index()
    {
        // Mengambil baris data pengaturan website pertama
        $setting = WebsiteSetting::first();

        return view('frontend.kontak.index', compact('setting'));
    }

    /**
     * Menangani Pengiriman Form Aspirasi / Pesan
     */
    public function storeMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'identity' => 'required|string|max:255',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);

       $simpan = ContactMessage::create([
            'name'     => $validatedData['name'],
            'identity' => $validatedData['identity'],
            'subject'  => $validatedData['subject'],
            'message'  => $validatedData['message'],
        ]);

        // Kembalikan dengan Flash Message Sukses
        return redirect()->back()->with('success', 'Terima kasih! Pesan atau aspirasi Anda telah berhasil dikirim.');
    }
}
