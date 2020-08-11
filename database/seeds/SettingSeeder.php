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
        $settings = [
          ['key'=>'name','value'=>'Royal'],
          ['key'=>'address','value'=>'Buttonwood, California'],
          ['key'=>'mobile','value'=>'+915'],
          ['key'=>'email','value'=>'royal342@gmail.com'],
          ['key'=>'latitude','value'=>'35.5'],
          ['key'=>'longitude','value'=>'52.5'],
          ['key'=>'logo','value'=>''],
          ['key'=>'video','value'=>''],
          ['key'=>'our_mission','value'=>''],
          ['key'=>'main_about','value'=>''],
          ['key'=>'minor_about','value'=>''],
        ];

        foreach ($settings as $setting){
            \App\Setting::create($setting);
        }

    }
}
