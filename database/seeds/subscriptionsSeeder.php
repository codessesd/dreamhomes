<?php

use Illuminate\Database\Seeder;

class subscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subscriptions')->truncate();
      DB::table('subscriptions')->insert([
        ['type'=>'285 x 12','description'=>'285 x 12 months gets you 128 000 ROI'],
        ['type'=>'450 x 12','description'=>'450 x 12 months gets you 128 000 ROI'],
        ['type'=>'750 x 12','description'=>'750 x 12 months gets you 128 000 ROI'],
      ]);
    }
}
