<?php namespace App\myRepo;


class LocalDbSeederService{
	
	private $dataObj;

	public function __construct(){

		$xmlPath = simplexml_load_file(dirname(__FILE__) . '/superShely.xml');
        $this->dataObj  = $xmlPath->xpath('Items/Item');
	}

	public function getItems(){

		return $this->filterXml($this->dataObj);
	}

	private function filterXml($dataObj){

		$item = [];
		
    	foreach($dataObj as $key => $items) {
    		
			$entry = [
				'ItemCode' => $items->ItemCode,
				'ItemName' => $items->ItemName,
				'ItemPrice' => $items->ItemPrice,
				'ItemStatus' => $items->ItemStatus
			];

    		$item[] = $entry;
    	}
    	return $item;
    }
		
	

}