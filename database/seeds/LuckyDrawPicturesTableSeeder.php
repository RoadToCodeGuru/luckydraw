<?php

use Illuminate\Database\Seeder;
use App\LuckyDraw;

class LuckyDrawPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            1 => '1.jpg',
            2 => '2-3.jpg',
            3 => '2-3.jpg',
            4 => '4-5.jpg',
            5 => '4-5.jpg',
            6 => '6-7.jpg',
            7 => '6-7.jpg',
            8 => '8-9-10.jpg',
            9 => '8-9-10.jpg',
            10 => '8-9-10.jpg',
            11 => '11.jpg',
            12 => '12.jpg',
            13 => '13.jpg',
            14 => '14-15.jpg',
            15 => '14-15.jpg',
            16 => '16.jpg',
            17 => '17.jpg',
            18 => null,
            19 => '19-20.jpg',
            20 => '19-20.jpg',
        ];

        for ($i=1; $i <= 20; $i++) { 
            $price = LuckyDraw::whereSpecialNumber($i)->first();
            $price->picture = $data[$i];
            $price->save();
        }
    }
}
