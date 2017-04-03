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
        Shope::create(['shopeName' => 'super sal','branche' => 'תל אביב','branche_id' => '2254']);
        Shope::create(['shopeName' => 'yochananof','branche' => 'רישון לציון','branche_id' => '2255']);
        Shope::create(['shopeName' => 'super big','branche' => 'אור יהודה','branche_id' => '2246']);
        Shope::create(['shopeName' => 'mega','branche' => 'בת-ים','branche_id' => '2266']);
        
    }
}
