<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrgStructureController extends Controller
{
    // Menampilkan halaman dashboard struktur organisasi
    public function index()
    {
        $managements = OrganizationalStructure::where('category', 'management')
            ->orderBy('order_position', 'asc')
            ->get();

        $staffs = OrganizationalStructure::where('category', 'staff')
            ->orderBy('order_position', 'asc')
            ->get();

        return view('admin.structure.index', compact('managements', 'staffs'));
    }

    // Menyimpan data pengurus/staf baru
    public function store(Request $request)
    {
        $request->validate([
            'category'       => 'required|in:management,staff',
            'role'           => 'required|string|max:255',
            'name'           => 'required|string|max:255',
            'nip'            => 'nullable|string|max:50',
            'photo'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order_position' => 'required|integer|min:0',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('organization', 'public');
        }

        OrganizationalStructure::create($data);

        return redirect()->back()->with('success', 'Data personel struktur organisasi berhasil ditambahkan!');
    }

    // Menghapus data pengurus/staf
    public function destroy(OrganizationalStructure $organizationalStructure)
    {
        if ($organizationalStructure->photo) {
            Storage::disk('public')->delete($organizationalStructure->photo);
        }

        $organizationalStructure->delete();

        return redirect()->back()->with('success', 'Personel berhasil dihapus dari struktur organisasi!');
    }
}
