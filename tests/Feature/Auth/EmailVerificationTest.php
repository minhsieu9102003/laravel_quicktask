<?php

namespace Tests\Feature\Auth;

use App\Models\User;
<<<<<<< HEAD
use App\Providers\RouteServiceProvider;
=======
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered(): void
    {
<<<<<<< HEAD
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
        $user = User::factory()->unverified()->create();
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3

        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified(): void
    {
<<<<<<< HEAD
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
        $user = User::factory()->unverified()->create();
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
<<<<<<< HEAD
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
=======
        $response->assertRedirect(route('dashboard', absolute: false).'?verified=1');
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
    }

    public function test_email_is_not_verified_with_invalid_hash(): void
    {
<<<<<<< HEAD
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
=======
        $user = User::factory()->unverified()->create();
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
