<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterPatientRequest;
use App\Services\Auth\PatientRegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'dokter' => redirect()->route('dokter.dashboard'),
                default => redirect()->route('pasien.dashboard'),
            };
        }

        return back()->withErrors(['email' => 'Email atau Password Salah !']);
    }

    /**
     * Show the registration form.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for a patient.
     */
    public function register(RegisterPatientRequest $request, PatientRegistrationService $service): RedirectResponse
    {
        $service->register($request->validated());

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
