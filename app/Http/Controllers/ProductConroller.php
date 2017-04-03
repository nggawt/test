<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shope;

use App\Product;

use Illuminate\Support\Facades\DB;

use App\myRepo\ShopeProcesorService;

use Carbon\Carbon;

class ProductConroller extends Controller
{
    use \App\myRepo\Searcher;
    protected $shopeObj;

    public function __construct(ShopeProcesorService $shopeService){

        $this->shopeObj = $shopeService;
    }

    public function index(){


        return view('dashboard.dashboard',['products' => $this->allItems(),'shopes' => Shope::all()]);
    	
    }

    public function show($findBy){
        
        return $this->shopeObj->searcherProcesor($findBy);
    }

    public function store(Request $request){

        return response($request->input(), 200)->header('Content-Type', 'application/json');
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
        

        return response($content,200);
        return response()->json(json_decode($content))
            ->withCallback($request->input('callback'));
        $product = Product::all();
        return $product;
        
    }
    public function search(Request $request){

        //if($request->input('shope_names') === 'שם הסופר'){ $request->input('shope_names') = null;}freeSearch
       
        $itemStatus;
        $inputs = $request->all();
        if($inputs['ItemStatus'] === '0'){ $itemStatus = '0';}
        if( (int) $inputs['ItemStatus'] === 1){ $itemStatus = 1;}
        $inputs = collect($inputs)->filter();
        if(isset($inputs['shopeName']) && $inputs['shopeName'] === 'שם הסופר'){ $inputs = $inputs->except('shopeName');}
        //dd($inputs);
        if(isset($inputs['freeSearch'])){ $freeSearch = $this->freeSearchs($inputs['freeSearch']); return view('dashboard.dashboard',['products' => $freeSearch,'shopes' => Shope::all()]);}
        //dd($inputs);
        if(count($inputs) > 1){
             //dd($inputs);
            $advanced = $this->advancedSearchs($inputs);
            //dd($advanced);
            return view('dashboard.dashboard',['products' => $advanced,'shopes' => Shope::all()]);
        }else{
            //dd($itemStatus);
            if(isset($itemStatus) && $itemStatus === '0'){ $itemStatus = $this->itemStatus($itemStatus); return view('dashboard.dashboard',['products' => $itemStatus,'shopes' => Shope::all()]);}
            if(isset($itemStatus) && (int) $inputs['ItemStatus'] === 1){ $itemStatus = $this->itemStatus($itemStatus); return view('dashboard.dashboard',['products' => $itemStatus,'shopes' => Shope::all()]);}

            //dd($inputs);
            $unique = $this->unique($inputs);
            //dd(collect($unique)['shopeName']);
            /*foreach ($unique as $key => $value) {
                echo $key . " : " . $value;
            }*/
            //dd($unique);
            return view('dashboard.dashboard',['products' => $unique,'shopes' => Shope::all()]);
        }
        
    }

    public function update($id){

    }

    public function destroy($id){

    }

    protected function istrueOrfalse($its){

        return $its === '0';
    }

    
}
