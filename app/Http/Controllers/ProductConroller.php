<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shope;

use App\Product;

use App\myRepo\ShopeProcesorService;

use Carbon\Carbon;

class ProductConroller extends Controller
{

    protected $shopeObj;

    public function __construct(ShopeProcesorService $shopeService){

        $this->shopeObj = $shopeService;
        //dd($shopeService);
    }

    public function index(){


        $params = request()->input();

        $xml = $this->shopeObj->getItems($params);

        return $xml;
        /*foreach ($xml as $key => $items) {

            
            foreach ($items as $kk => $value) {
                
                echo $kk . " : " . $value . "<br />";
            }

        }*/



        /*return isset($_SERVER['CONTENT_TYPE'])? $_SERVER['CONTENT_TYPE']:"Please Set Content Type Header";
    	$shope = Product::all();
        return response($shope, 200);*/
    	
    }

    public function show($findBy){
        $params = request()->input();
        //dd($params);
        return $this->shopeObj->getItemsBy($findBy);
    }

    public function store(Request $request){


        //$content = $request->json()->all();
        $req = request()->instance();
        $content = $req->getContent();
        $data = $request->json()->all();
        //$data->toJson();
        //var_dump($data);
        $data = json_decode(json_encode($content));

        if(json_last_error()){
            return json_last_error();
        }else{
            return $data;
        }
        
        //var_dump($content);
        //return json_decode($content);//response(,200));
        //var_dump($request->getContent());
        //return $request->getContent();
        return response($content,200);
        return response()->json(json_decode($content))
            ->withCallback($request->input('callback'));
        $product = Product::all();
        return $product;
        
    }

    
}
