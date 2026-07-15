<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Halaman LPM (Lembaga Penjaminan Mutu)
     */
    public function lpm()
    {
        return view('frontend.unit.lpm');
    }

    /**
     * Halaman LP2M (Lembaga Penelitian dan Pengabdian kepada Masyarakat)
     */
    public function lp2m()
    {
        return view('frontend.unit.lp2m');
    }

    /**
     * Halaman ORMAWA (Organisasi Mahasiswa)
     */
    public function ormawa()
    {
        return view('frontend.unit.ormawa');
    }
}
