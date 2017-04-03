<?php namespace App\myRepo;


use App\Shope;

use App\Product;

class ShopeProcesorService{

	use Searcher;
	protected $filters = [
		'ItemCode' => 'ItemCode',
		'ItemName' => 'ItemName',
		'ItemPrice' => 'ItemPrice',
		'ItemStatus' => 'ItemStatus',
		'shopeName' => 'shopeName',
		'id'		=> 'id',
		'freeSearch' => 'freeSearch'
	];

	/*protected $filterSearch = [
		'byItem',
		'byName',
		'byPrice',
		'byStatus'
	];*/

	public function searcherProcesor($params = []){

		if(empty($params)){
			return $this->filterXml(Product::all());
		}

		if(isset($params['searchBy'])){

			//dd($params);
			//$collect = collect($this->filters);
			$explodeParams = explode(',',$params['searchBy']);

			//dd($explodeParams);
			
			$collectInstanse = collect($explodeParams);

			//dd($collectInstanse);

			$collectInstanse = collect($explodeParams)->implode('=');

			//dd($collectInstanse);
			//preg_match   (?:ItemCode|ItemName|ItemPrice|ItemStatus|shopeName|id|)\=(\w+)?

			// (?:[^\=][Item|shop])+(?:[id]?[a-zA-z]+)\=[\d*|\.\d*|a-zA-z]+

			$pregMatch = preg_match_all('/(?:(?:ItemCode)|(?:ItemName)|(?:ItemPrice)|(?:ItemStatus)|(?:shopeName)|(?:id))\=(?:[a-zA-z |\w\.\d])+/', $collectInstanse,$matches);

			$collect = collect($matches)->collapse()->implode('=');

			//dd($matches);

			$exploded = collect(explode('=',$collect));

			//dd($exploded);

			$toarray = $exploded->toArray();

			//dd($toarray);

			$intersect = $exploded->intersect($this->filters);

			//dd($intersect);

			//$keys = array_keys($intersect->toArray());


			//dd($keys);
			$diff = $exploded->diff($intersect);

			//dd($diff);

			//$splice = $diff->splice(count($keys));

			//dd($diff->all());
			$combine = $intersect->combine($diff);

			//dd($combine);

			if(count($combine) > 1){

				return $this->advancedSearchs($combine);
			}else{
				return $this->unique($combine);
			}
		}

			
	}

	protected function findUnque($key, $value){

		return Product::where($key,$value)->first();

	}

	public function getItemsBy($findBy){

		
		//return $this->filterXml(Product::where('ItemCode',$findBy)->get());
	}

	public function findByShopName($inputValue){
		//dd(Shope::where('shope_name', $inputValue)->first()->products);
		return $this->filterXml(Shope::where('shopeName', $inputValue)->first()->products);
	}
	private function filterXml($dataObj,$params = []){

		$item = [];
		//dd($params);
    	foreach($dataObj as $key => $items) {
    		
			$entry = [
				'ItemCode' => $items->ItemCode,
				'ItemName' => $items->ItemName,
				'ItemPrice' => $items->ItemPrice,
				'ItemStatus' => $items->ItemStatus
			];

			//$addParamToentry

    		$item[] = $entry;
    	}
    	return $item;
    }
		
	

}