<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pass;

class CrudPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_auth_users_can_create_pass()
    {
        $this->actingAs(\App\Models\User::factory()->create());
        $pass = \App\Models\Pass::factory()->make();
        $this->post('/pass',$pass->toArray());
        $this->assertEquals(1,Pass::all()->count());
    }

    /** @test */
    public function test_unauth_users_cannot_create_pass()
    {
        $pass = \App\Models\Pass::factory()->make();
        $this->post('/pass',$pass->toArray())->assertRedirect('/login');
    }

    /** @test */
    public function test_admin_user_can_edit_role_for_users()
    {
        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));
        $user = \App\Models\User::factory()->create();
        $user->role_id = "8";
        $this->patch('/role/edit/'.$user->id, $user->toArray());
        $this->assertDatabaseHas('users',['id'=> $user->id , 'role_id' => '8']);
    }

}
