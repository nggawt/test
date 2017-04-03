<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shope;

use App\Product;

use Illuminate\Support\Facades\DB;

use App\myRepo\ShopeProcesorService;

class ApiController extends Controller
{

	protected $shopeObj;

    public function __construct(ShopeProcesorService $shopeService){

        $this->shopeObj = $shopeService;
        //dd($shopeService);
    }

    public function index(){

    	$params = request()->input();
    	//dd($params);
        $data = $this->shopeObj->searcherProcesor($params);
        return $data;
        return response()->json($data);
    }

    public function show(){
    	
    }

    public function store(){
    	
    }

    public function update(){
    	
    }

    public function destroy(){
    	
    }

}
