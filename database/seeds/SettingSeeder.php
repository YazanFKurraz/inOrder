<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = App\Models\Setting::create([
            'site_name' => 'InOrder',
            'email' => 'inOrder@gmail.com',
            'phone'=> '059226574',
            'loaction'=> 'Gaza',
            'logo'=> 'logo.jpg',
            'facebook_url'=> 'www.facebook.com',
            'twitter_url'=> 'www.twitter.com',
            'instagram_url'=> 'www.instagram.com',
            'about_us'=> 'about us about us about us about us about us about us about us about us ',
        ]);
    }
}
