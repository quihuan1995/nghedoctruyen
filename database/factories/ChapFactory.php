<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i = 0;
        $i++;
        return [
            'name'=> 'Côn Luân Ma Chủ Tập '.$i,
            'book_id'=>'85',
            'audio'=> 'https://archive.org/download/con-luan-ma-chu-full/con-luan-ma-chu-tap-'.$i.'.mp3'
        ];
    }
}