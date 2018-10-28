<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Capsule;
use App\Capsule_price;

class CapsulesController extends Controller
{
 public function __construct()
    {
       $this->middleware('auth');
    }

    public function index() {
       /// $user = Auth::user();
	    $capsule = DB::table('capsules')
		    ->join('capsule_prices','capsules.id','=','capsule_prices.capsule_id')
                    ->select('capsules.name','capsules.img_name','capsule_prices.price')
                    ->groupBy('capsules.id','capsule_prices.id')
		    ->get();
           // $capsule_price = DB::table('capsule_prices')
	//	->select('capsule_id','price')
	//	->get();

        return view('purchase-page.index', ['capsule' => $capsule]);
    }

    public function confirm(Request $request,$name){
	    $capsule =  Capsule::where('name','=',$name)
		        ->join('capsule_prices','capsules.id','=','capsule_prices.capsule_id')
		    	->first();
        return view('purchase-page.confirm', ['capsule' => $capsule]);//,['price' => $capsule_price]);
    }


}
