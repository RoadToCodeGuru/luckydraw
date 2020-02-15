<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'service'
        ]);

        Type::create([
            'name' => 'second_service'
        ]);

        Type::create([
            'name' => 'lucky_draw'
        ]);
    }
}
