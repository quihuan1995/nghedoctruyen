<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::table('genres')->insert([
            ['name'=>'MA NGẮN','slug'=>'truyen-ma-ngan'],
            ['name'=>'MA BÙA NGẢI','slug'=>'truyen-ma-bua-ngai'],
            ['name'=>'MA DÀI KỲ','slug'=>'truyen-ma-dai-ky'],
            ['name'=>'MA DÂN TỘC','slug'=>'truyen-ma-dan-toc'],
            ['name'=>'MA CÓ THẬT','slug'=>'truyen-ma-co-that'],
            ['name'=>'LÀNG QUÊ DÂN GIAN','slug'=>'truyen-lang-que-dan-gian'],
            ['name'=>'PHÁP SƯ TRỪ TÀ','slug'=>'truyen-phap-su-tru-ta'],
            ['name'=>'KIẾM HIỆP – TIÊN HIỆP','slug'=>'truyen-kiem-hiep-tien-hiep'],
        ]);
    }
}
