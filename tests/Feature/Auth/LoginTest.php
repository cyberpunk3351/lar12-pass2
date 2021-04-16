<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class LoginTest extends TestCase
{
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::class;

        $response = $this->post('/login', [
            'email' => 'drummer.ilya@gmail.com',
            'password' => 'drummer-33',
        ]);

        $response->assertRedirect('/home');
        // $this->assertAuthenticatedAs($user);
        $response->assertSessionHasNoErrors();
    }

    public function testExample()
    {
        $response = $this->get('/login');

        $response->dump();
    }


}
