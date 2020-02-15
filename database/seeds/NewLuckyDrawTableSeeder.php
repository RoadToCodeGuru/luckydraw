<?php

use Illuminate\Database\Seeder;
use App\LuckyDraw;
use App\Type;
use App\Staff;

class NewLuckyDrawTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lucky_draw_type_id = Type::find(2)->id;

        $normal_lucky_draws = [
            ['Glacier Stand Fan', 262],
            ['Tefal flying Pan', 263],
            ['Rice Cooker ( Kangaroo)', 264],
            ['FARFALLA Stand Fan', 265],
            ['Electric Pan Cooker (Hanabishi)', 266],
            ['Electric Pan Cooker (Hanabishi)', 267],
            ['Shoe Rask and Lunch Box', 268],
            ['Shoe Rask and Blanket', 269],
            ['Three Season Blanket (Sweety Home)', 270],
            ['Blanket ( The Best)', 271],
            ['Blanket ( The Best)', 272],
            ['Blender (Diamond)', 273],
            ['Blender (Diamond)', 274],
            ['Electric Pan Cooker (Misushita)', 275],
            ['Electric Pan Cooker (Misushita)', 276],
            ['Electric Pan Cooker ( Sokany)', 277],
            ['Electric Pan Cooker ( Sokany)', 278],
            ['Electric Pan Cooker ( Sokany)', 279],
            ['CB Bank Debit Card ( 20000ks)', 280],
            ['CB Bank Debit Card ( 20000ks)', 281],
            ['CB Bank Debit Card ( 20000ks)', 282],
            ['Memory Card (8GB)+ Electric Kettle+ Lunch Box', 5]
        ];

        foreach($normal_lucky_draws as $ld){
            LuckyDraw::create([
                'name' => $ld[0],
                'number' => $ld[1],
                'special_number' => null,
                'type_id' => $lucky_draw_type_id
            ]);
        }

        // normal
        // LuckyDraw::whereNull('special_number')
        //     ->whereNull('staff_id')
        //     ->whereTypeId(2)
        //     ->get()
        //     ->each(function($e){
        //         $winner = Staff::whereTypeId(2)->whereAlreadyWinner(false)->inRandomOrder()->first();
        //         $winner->already_winner = true;
        //         $winner->save();

        //         $e->staff_id = $winner->id;
        //         $e->save();
        //     });
    }
}
