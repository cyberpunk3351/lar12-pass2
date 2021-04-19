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

    use DatabaseTransactions;

    /**
     * The login form can be displayed.
     *
     * @return void
     */
    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

        /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function testRegistersAValidUser()
    {
        $user = \App\Models\User::factory(User::class)->make();
        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertStatus(302);
        $this->assertAuthenticated();
    }

    /**
     * A valid user can be logged in.
     *
     * @return void
     */
    public function testLoginAValidUser()
    {
        $user = \App\Models\User::factory(User::class)->create(['role_id' => 2]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        // $this->assertAuthenticatedAs($user);
        $response = $this->get('/admin');
        // $response->assertStatus(302);
        // $response->assertRedirect('/home');
        // $response->assertStatus(200);
        // $this->assertAuthenticatedAs($user);
        
        // $response->dump();
    }


    /** @test */
    public function auth_user_can_view_form_create_pass()
    {
        $user = \App\Models\User::factory(User::class)->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response = $this->get('/pass/create');
        $response->assertStatus(200);

    }

    /** @test */
    public function auth_user_can_create_pass()
    {
        // $this->withoutExceptionHandling();

        // $this->actingAs(\App\Models\User::factory()->create());
        $pass = \App\Models\Pass::factory()->make();

        // $this->post('/pass/create',$pass->toArray());
        // $this->assertEquals(1,Pass::all()->count());

        $this->post('/pass/create',$pass->toArray())
        ->assertRedirect('/login');


        // $response = $this->get('/pass/create');
        // $response->assertStatus(200);

    }
}
