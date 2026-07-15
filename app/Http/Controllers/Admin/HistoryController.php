<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoryInfo;
use App\Models\HistoryTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    // Menampilkan halaman dashboard manajemen sejarah (Info & List Timeline)
    public function index()
    {
        $info = HistoryInfo::first();
        $timelines = HistoryTimeline::orderBy('year', 'asc')->get();

        return view('admin.history.index', compact('info', 'timelines'));
    }

    // Memperbarui informasi Latar Belakang (Single Row)
    public function updateInfo(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'text_1' => 'required|string',
            'text_2' => 'nullable|string',
            'image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $info = HistoryInfo::first();
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($info && $info->image) {
                Storage::disk('public')->delete($info->image);
            }
            $data['image'] = $request->file('image')->store('history', 'public');
        }

        HistoryInfo::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Latar belakang sejarah berhasil diperbarui!');
    }

    // Menyimpan Milestone/Timeline Baru
    public function storeTimeline(Request $request)
    {
        $request->validate([
            'year'        => 'required|numeric|digits:4',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        HistoryTimeline::create($request->all());

        return redirect()->back()->with('success_timeline', 'Milestone tahun baru berhasil ditambahkan!');
    }

    // Menghapus data Milestone/Timeline
    public function destroyTimeline(HistoryTimeline $historyTimeline)
    {
        $historyTimeline->delete();
        return redirect()->back()->with('success_timeline', 'Milestone berhasil dihapus!');
    }
}
