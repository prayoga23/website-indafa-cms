<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Cek status keaktifan akun pengguna
        if ($user && !$user->is_active) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda sedang dinonaktifkan oleh Administrator Kampus. Silakan hubungi pihak Rektorat/IT.',
            ]);
        }

        // Pengalihan cerdas sesuai peran (role & jobdesk)
        if ($user) {
            if ($user->isSuperAdmin()) {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }

            if ($user->role === 'Admin Fakultas' && $user->faculty_code) {
                if ($user->faculty_code === 'febit') {
                    return redirect()->intended(route('admin.dashboard.febit', absolute: false));
                }
                if ($user->faculty_code === 'syariah') {
                    return redirect()->intended(route('admin.dashboard.syariah', absolute: false));
                }
            }

            if ($user->role === 'Dosen Prodi' && $user->prodi_code) {
                return redirect()->intended(route('admin.portal-prodi.edit', $user->prodi_code, absolute: false));
            }

            if ($user->role === 'Admin Lembaga' && $user->unit_code) {
                return redirect()->intended(route('admin.portal.edit', $user->unit_code, absolute: false));
            }
        }

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
