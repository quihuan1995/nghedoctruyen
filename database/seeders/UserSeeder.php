<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'avatar'=>'no-avatar.png',
                'password'=>bcrypt(123456),
            ]
        ]);
    }
}
