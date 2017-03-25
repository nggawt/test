<?php

use Illuminate\Database\Seeder;

use App\myRepo\LocalDbSeederService;

use App\Product;

use App\Shope;

class ProductDbSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(LocalDbSeederService $shopeObj)
    {

        
        DB::table('products')->truncate();
        $shope = Shope::all();
        $items = $shopeObj->getItems();
        $ii = 1;
        $shope = collect([1, 2, 3,4]);
        foreach($items as $key => $value) {

            
            $ProductModel = new Product();
                
            $ProductModel->shope_id = $shope->random();
            $ProductModel->branche_id = $ii++;
            if(isset($value['ItemCode'])){ $ProductModel->ItemCode = $value['ItemCode'];}
            if(isset($value['ItemName'])){ $ProductModel->ItemName = $value['ItemName'];}
            if(isset($value['ItemPrice'])){ $ProductModel->ItemPrice = $value['ItemPrice'];}
            if(isset($value['ItemStatus'])){ $ProductModel->ItemStatus = $value['ItemStatus'];}
            //}
            $ProductModel->save();
        }
    }
}
