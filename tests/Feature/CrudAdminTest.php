<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pass;
use App\Models\Category;
use Illuminate\Http\Request;

class CrudAdminTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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

    /** @test */
    public function test_admin_user_can_edit_categories()
    {
        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));
        $categories = \App\Models\Category::factory()->create();
        $categories->title = "Test";
        // dd($categories);
        $this->patch('/category/edit/'.$categories->id, $categories->toArray());
        $this->assertDatabaseHas('categories',['id'=> $categories->id , 'title' => 'Test']);
    }


    /** @test */
    public function test_admin_user_can_edit_categories_roles()
    {
        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));

        $category = \App\Models\Category::factory()->create();
        $role = \App\Models\Role::factory()->create();
        $category->roles()->sync($role);

        $this->assertDatabaseHas('categories_roles', [
            'categories_id' => $category->id,
            'roles_id' => $role->id
        ]);
    }

    
    /** @test */
    public function test_admin_user_can_edit_categories_roles2()
    {

        $category = \App\Models\Category::factory()->create(['id' => 1]);
        $role = \App\Models\Role::factory()->create(['id' => 1]);

        // $category->roles()->sync($role);

        $data = [
            '1' => ['1' => '1'],
        ];

        $this->actingAs(\App\Models\User::factory()->create(['role_id' => 1]));
        $this->post('/admin/connections', $data);



        // ->post(route('connections.update'), [
        //     '1' => ['1' => '1'],
        //     '2' => ['1' => '1'],
        //     ]);

        $this->assertDatabaseHas('categories_roles', [
            'categories_id' => $category->id,
            'roles_id' => $role->id
        ]);

        // $request = Request::create('/', 'GET', [
        //     '1' => ['1' => '1'],
        //     '2' => ['1' => '1'],
        //     ]);


        // dd($request);
        // $this->post('/admin/connections', $input->toArray());

    }

    

}
