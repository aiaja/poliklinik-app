<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientRegistrationService
{
    /**
     * Register a new patient.
     *
     * @param array $data
     * @return User
     */
    public function register(array $data): User
    {
        $no_rm = $this->generateNoRm();

        return User::create([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'no_ktp' => $data['no_ktp'],
            'no_hp' => $data['no_hp'],
            'no_rm' => $no_rm,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pasien',
        ]);
    }

    /**
     * Generate a unique Medical Record Number (no_rm).
     * Format: YYYYMM-XXX
     *
     * @return string
     */
    private function generateNoRm(): string
    {
        $prefix = date('Ym');
        $count = User::where('no_rm', 'like', $prefix . '-%')->count();
        
        return $prefix . '-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);
    }
}
