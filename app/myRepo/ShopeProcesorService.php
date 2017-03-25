<?php namespace App\myRepo;


use App\Shope;

use App\Product;

class ShopeProcesorService {
	
	protected $filters = [
		'ItemCode' => 'byItem',
		'ItemName' => 'byName',
		'ItemPrice' => 'byPrice',
		'ItemStatus' => 'byStatus'
	];

	protected $filterSearch = [
		'byItem',
		'byName',
		'byPrice',
		'byStatus'
	];

	public function getItems($params){

		if(empty($params)){
			return $this->filterXml(Product::all());
		}

		if(isset($params['searchBy'])){

			dd($params['searchBy']);
			//$collect = collect($this->filters);
			$explodeParams = explode('=',$params['searchBy']);
			$findElem = array_intersect($this->filterSearch,$explodeParams);

			dd($explodeParams);
			$collection = $collection->each(function ($item, $key) {
//
			});
		

			//dd($searchByParam['searchBy']);

			$paramIntersect = array_intersect($this->filters,$params);
			dd($paramIntersect);
		}

		return "searchBy : not set";
		return $this->filterXml(Product::all());
	}

	public function getItemsBy($findBy){

		
		return $this->filterXml(Product::where('ItemCode',$findBy)->get());
	}

	private function filterXml($dataObj,$params = []){

		$item = [];
		//dd($params);
    	foreach($dataObj as $key => $items) {
    		
			$entry = [
				'ItemCode' => $items->ItemCode,
				'ItemName' => $items->ItemName,
				'ItemPrice' => $items->ItemPrice,
				'ItemStatus' => $items->ItemStatus,
			];

			//$addParamToentry

    		$item[] = $entry;
    	}
    	return $item;
    }
		
	

}