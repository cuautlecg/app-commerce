<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Cuautle',
            'email' => 'cuautlecg@gmail.com',
            'password' => bcrypt('Carlos1611')
        ]);
    }
}
