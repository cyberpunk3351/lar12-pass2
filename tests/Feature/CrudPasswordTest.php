<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pass;
use App\Models\Category;

class CrudPasswordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_auth_user_can_create_pass()
    {
        $this->actingAs(\App\Models\User::factory()->create());
        $pass = \App\Models\Pass::factory()->make();
        $this->post('/pass',$pass->toArray());
        $this->assertEquals(1,Pass::all()->count());
    }

    /** @test */
    public function test_unauth_user_cannot_create_pass()
    {
        $pass = \App\Models\Pass::factory()->make();
        $this->post('/pass',$pass->toArray())->assertRedirect('/login');
    }

    /** @test */
    public function test_admin_user_can_edit_roles_for_users()
    {
        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));
        $user = \App\Models\User::factory()->create();
        $user->role_id = "8";
        $this->patch('/role/edit/'.$user->id, $user->toArray());
        $this->assertDatabaseHas('users',['id'=> $user->id , 'role_id' => '8']);
    }

    /** @test */
    public function test_admin_user_can_create_categories()
    {
        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));
        $categories = \App\Models\Category::factory()->make();
        $this->post('/category',$categories->toArray());
        $this->assertEquals(1,Category::all()->count());
    }

}
