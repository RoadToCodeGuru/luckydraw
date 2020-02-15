<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\Staff;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'cosmos.stu@gmail.com',
            'password' => bcrypt('testing'),
            'name' => 'Sithu Aung'
        ]);
    }
}
