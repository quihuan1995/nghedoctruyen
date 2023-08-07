<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accents')->delete();
        DB::table('accents')->insert([
            ['name'=>'Đình Soạn','slug'=>'dinh-soan'],
            ['name'=>'Quảng A Tũn','slug'=>'quang-a-tun'],
            ['name'=>'Nguyễn Huy','slug'=>'nguyen-huy'],
            ['name'=>'Trần Vân','slug'=>'tran-van'],
            ['name'=>'Tiến Phong','slug'=>'tien-phong'],
            ['name'=>'Tuấn Anh','slug'=>'tuan-anh'],
            ['name'=>'Vy Vy','slug'=>'vy-vy'],
            ['name'=>'Ngọc Lâm','slug'=>'ngoc-lam'],
            ['name'=>'Phi Tùng','slug'=>'phi-tung'],
            ['name'=>'Đình Duy','slug'=>'dinh-duy'],
            ['name'=>'Lam Phương','slug'=>'lam-phuong'],
            ['name'=>'Trần Thy','slug'=>'tran-thy'],
            ['name'=>'Nguyễn Ngọc Ngạn','slug'=>'nguyen-ngoc-ngan'],
            ['name'=>'Lê Trang','slug'=>'le-trang'],
            ['name'=>'Hư Trúc','slug'=>'hu-truc'],
            ['name'=>'Duy Thuận','slug'=>'duy-thuan'],
            ['name'=>'Giao Thông','slug'=>'giao-thong'],
            ['name'=>'Âm Phong','slug'=>'am-phong'],
        ]);
    }
}
