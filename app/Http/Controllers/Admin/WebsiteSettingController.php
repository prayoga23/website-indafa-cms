<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteSettingRequest;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    /**
     * Tampilkan halaman setting
     */
    public function index()
    {
        $setting = WebsiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Nama Kampus',
            ]
        );

        return view('admin.website-settings.index', compact('setting'));
    }

    /**
     * Update data setting
     */
    public function update(WebsiteSettingRequest $request)
    {
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);

        $data = $request->validated();

        // =========================
        // UPLOAD LOGO
        // =========================
        if ($request->hasFile('logo')) {

            // hapus file lama
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }

            // simpan file baru
            $data['logo'] = $request->file('logo')
                ->store('website/logo', 'public');
        }

        // =========================
        // UPLOAD FAVICON
        // =========================
        if ($request->hasFile('favicon')) {

            // hapus file lama
            if ($setting->favicon && Storage::disk('public')->exists($setting->favicon)) {
                Storage::disk('public')->delete($setting->favicon);
            }

            // simpan file baru
            $data['favicon'] = $request->file('favicon')
                ->store('website/favicon', 'public');
        }

        // =========================
        // UPDATE DATA
        // =========================
        $setting->update($data);

        return redirect()
            ->route('admin.website-settings.index')
            ->with('success', 'Website setting berhasil diperbarui');
    }
}
