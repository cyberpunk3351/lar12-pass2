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

}
