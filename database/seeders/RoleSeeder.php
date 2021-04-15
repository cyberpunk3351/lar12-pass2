<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    static $roles = [
        'Админ',
        'Пользователь',
        'Гость',
        'Работник',
        'Программист',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$roles as $role) {
            DB::table('roles')->insert([
                'title' => $role,
            ]);
        }
    }
}
