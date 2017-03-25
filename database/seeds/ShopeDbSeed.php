<?php

use Illuminate\Database\Seeder;



use App\Shope;

class ShopeDbSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::table('products')->truncate();
        Shope::create(['shope_name' => 'shely','branche' => 'tel-aviv','branche_id' => '2254']);
        Shope::create(['shope_name' => 'shely','branche' => 'rishon lezion','branche_id' => '2255']);
        Shope::create(['shope_name' => 'shope_market','branche' => 'or yehuda','branche_id' => '2246']);
        Shope::create(['shope_name' => 'lahav','branche' => 'bat-yam','branche_id' => '2266']);
        
    }
}
