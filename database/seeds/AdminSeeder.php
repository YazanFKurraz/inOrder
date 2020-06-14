<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Models\Admin::create([
            'name' => 'AbedElRahman',
            'email' => 'abed@gmail.com',
            'password'=> bcrypt('123456'),
            'image'=> 'profile.jpg',
            'phone'=> '0592663574',
        ]);
    }
}
