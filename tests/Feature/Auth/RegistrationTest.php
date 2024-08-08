<?php

namespace Tests\Feature\Auth;

<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
<<<<<<< HEAD
        $response->assertRedirect(RouteServiceProvider::HOME);
=======
        $response->assertRedirect(route('dashboard', absolute: false));
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
    }
}
