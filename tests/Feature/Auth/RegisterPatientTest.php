<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Tests\TestCase;

class RegisterPatientTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(ValidateCsrfToken::class);
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_patients_can_register(): void
    {
        $response = $this->post('/register', [
            'nama' => 'Test Pasien',
            'alamat' => 'Alamat Test',
            'no_ktp' => '1234567890123456',
            'no_hp' => '08123456789',
            'email' => 'pasien@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'pasien@test.com',
            'role' => 'pasien',
        ]);

        $user = User::where('email', 'pasien@test.com')->first();
        $this->assertNotNull($user->no_rm);
        $this->assertStringStartsWith(date('Ym'), $user->no_rm);

        $response->assertRedirect(route('login'));
    }

    public function test_no_rm_is_incremented_correctly(): void
    {
        $prefix = date('Ym');
        User::factory()->create(['no_rm' => $prefix . '-001']);

        $this->post('/register', [
            'nama' => 'Test Pasien 2',
            'alamat' => 'Alamat Test 2',
            'no_ktp' => '1234567890123457',
            'no_hp' => '08123456790',
            'email' => 'pasien2@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $user = User::where('email', 'pasien2@test.com')->first();
        $this->assertEquals($prefix . '-002', $user->no_rm);
    }

    public function test_registration_fails_with_duplicate_ktp(): void
    {
        User::factory()->create(['no_ktp' => '1234567890123456']);

        $response = $this->post('/register', [
            'nama' => 'Test Pasien',
            'alamat' => 'Alamat Test',
            'no_ktp' => '1234567890123456',
            'no_hp' => '08123456789',
            'email' => 'new@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('no_ktp');
        $this->assertDatabaseCount('users', 1);
    }
}
