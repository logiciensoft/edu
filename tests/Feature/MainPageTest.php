<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MainPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_auth_user_can_access_homepage()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    /** @test */
    public function homepage_contains_oauth2_credentials()
    {
        \Artisan::call('passport:install');

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
        $response->assertSee('Oauth Credentials');
        $response->assertSee('Client Secret');
        $response->assertSee($user->email);
    }
}
