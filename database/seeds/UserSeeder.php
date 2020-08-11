<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'image'=>'default.png',
            'password'=>bcrypt('123456789')
        ]);
    }
}
