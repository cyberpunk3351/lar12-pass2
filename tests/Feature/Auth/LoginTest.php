<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pass;


class LoginTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_login_form_dsplayed()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_registers_a_valid_user()
    {
        $user = \App\Models\User::factory(User::class)->make();
        // dd($user);
        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticated();
        
    }

    /** @test */
    // public function test_admin_access()
    // {
    //     $user = \App\Models\User::factory(User::class)->create(['role_id' => 1]);
    //     $response = $this->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'password'
    //     ]);
    //     $this->assertAuthenticatedAs($user);
    //     $this->get('/admin');
    // }

}
