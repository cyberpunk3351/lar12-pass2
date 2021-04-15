<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AddAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

            DB::table('users')->insert([
            'name' => 'Admin',
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
