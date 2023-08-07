<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['name'=>'Quản trị viên','slug'=>'admin'],
            ['name'=>'Thể loại ','slug'=>'genre'],
            ['name'=>'Sách truyện','slug'=>'book'],
            ['name'=>'Chương truyện','slug'=>'chap'],
            ['name'=>'Tài khoản','slug'=>'user'],
            ['name'=>'Tác giả','slug'=>'author'],
            ['name'=>'Người đọc','slug'=>'accent'],
            ['name'=>'Phân quyền','slug'=>'role'],
        ]);
    }
}
