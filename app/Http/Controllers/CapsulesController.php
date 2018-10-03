<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Capsule;

class CapsulesController extends Controller
{
 public function __construct()
    {
       $this->middleware('auth');
    }

    public function index() {
       /// $user = Auth::user();
        $capsule = DB::table('capsules')
                    ->select('capsules.name', 'capsules.price')
                    ->groupBy('capsules.id')
                    ->get();
        return view('purchase-page.index', ['capsule' => $capsule]);
    }

    public function confirm(Request $request,$name){
	    $capsule =  Capsule::where('name','=',$name)
		    	->first();

        return view('purchase-page.confirm', ['capsule' => $capsule]);
    }


}
