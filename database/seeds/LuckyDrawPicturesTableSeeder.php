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
            1 => '1st.png',
            2 => '2nd.png',
            3 => '3rd.png',
            4 => '4th.png',
            5 => '5th.png',
            6 => '6th.png',
            7 => '7th.png',
            8 => '8th.png',
            9 => '9th.png',
            10 => '10th.png',
            11 => '11th.png',
            12 => '12th.png',
            13 => '13th.png',
            14 => '14th.png',
            15 => '15th.png',
            16 => '16th.png',
            17 => '17th.png',
            18 => '18th.png',
            19 => '19th.png',
            20 => '20th.png',
        ];

        for ($i=1; $i <= 20; $i++) { 
            $price = LuckyDraw::whereSpecialNumber($i)->first();
            $price->picture = $data[$i];
            $price->save();
        }
    }
}
