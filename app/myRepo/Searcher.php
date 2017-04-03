<?php namespace App\myRepo;

use App\Shope;

use App\Product;

use DB;

trait Searcher{
	
	public function allItems(){

		return Product::all();
	}

	public function unique($params){
		
		foreach ($params as $key => $param) {
			if($key === 'shopeName'){ return $this->shopeName($key,$param);}	
			return Product::where($key,$param)->firstOrfail();
			
		}
	}

	public function shopeName($key,$params){

		 return Shope::where($key,$params)->firstOrfail()->products;
	}

	public function itemStatus($key){

		 return Product::where('ItemStatus',$key)->get();
	}

	public function advancedSearchs($params){
		
		$chunck = [];
		foreach ($params as $key => $param) {
			# code...
			if($key === 'shopeName'){ $chunck[] = $this->shopeName($key,$param);}	
			if($key !== 'shopeName'){
				foreach (Product::where($key, $param)->cursor() as $data) {
		    				
					$chunck[] = $data;
				}
			}
		}
		return $chunck ;
	}

	public function freeSearchs($param){
		//dd($param);
        $like = DB::table('products')
            ->where('ItemName', 'like', "%$param%")
            ->get();
        return $like;
	}

}