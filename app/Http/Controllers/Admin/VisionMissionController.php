<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use App\Models\VisionMissionItem;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    // Menampilkan halaman dashboard manajemen Visi, Misi & Tujuan
    public function index()
    {
        $vision = Vision::first();
        $missions = VisionMissionItem::where('type', 'mission')->orderBy('order_position', 'asc')->get();
        $objectives = VisionMissionItem::where('type', 'objective')->orderBy('order_position', 'asc')->get();

        return view('admin.vision.index', compact('vision', 'missions', 'objectives'));
    }

    // Memperbarui teks Visi Utama (Single Row)
    public function updateVision(Request $request)
    {
        $request->validate([
            'vision_text' => 'required|string',
        ]);

        Vision::updateOrCreate(['id' => 1], [
            'vision_text' => $request->vision_text
        ]);

        return redirect()->back()->with('success_vision', 'Visi prodi berhasil diperbarui!');
    }

    // Menambah Poin Misi atau Tujuan baru
    public function storeItem(Request $request)
    {
        $request->validate([
            'type'           => 'required|in:mission,objective',
            'content'        => 'required|string',
            'order_position' => 'required|integer|min:0',
        ]);

        VisionMissionItem::create($request->all());

        return redirect()->back()->with('success_item', 'Poin berhasil ditambahkan ke daftar!');
    }

    // Menghapus Poin Misi atau Tujuan
    public function destroyItem(VisionMissionItem $visionMissionItem)
    {
        $visionMissionItem->delete();
        return redirect()->back()->with('success_item', 'Poin berhasil dihapus dari daftar!');
    }
}
