<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Halaman LPM (Lembaga Penjaminan Mutu)
     */
    public function lpm()
    {
        $page = Page::where('slug', 'lpm')->where('status', 'publish')->first();
        return view('frontend.unit.lpm', compact('page'));
    }

    /**
     * Halaman LP2M (Lembaga Penelitian dan Pengabdian kepada Masyarakat)
     */
    public function lp2m()
    {
        $page = Page::where('slug', 'lp2m')->where('status', 'publish')->first();
        return view('frontend.unit.lp2m', compact('page'));
    }

    /**
     * Halaman ORMAWA (Organisasi Mahasiswa)
     */
    public function ormawa()
    {
        $page = Page::where('slug', 'ormawa')->where('status', 'publish')->first();
        return view('frontend.unit.ormawa', compact('page'));
    }
}
