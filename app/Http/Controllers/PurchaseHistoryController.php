<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Capsule;
use App\PurchaseHistory;

class PurchaseHistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        $history = DB::table('purchase_histories')
                    ->join('capsules', 'purchase_histories.capsule_id', '=', 'capsules.id')
                    ->select('capsules.name', 'capsules.price', DB::raw('sum(purchase_histories.quantity) as sum_quantity'))
                    ->where('purchase_histories.user_id', '=', $user->id)
                    ->groupBy('capsules.id')
                    ->get();
        return view('purchase-history.index', ['history' => $history]);
    }

    public function create() {
        return view('article.create');
    }

    public function complete(Request $request){
	    $addhistory = new PurchaseHistory;
	   $addhistory->user_id = Auth::user()->id;
	   $addhistory->capsule_id = $request->id;
	   $addhistory->quantity = 1;
	   $addhistory->created_at = date('Y-m-d H:i:s');
	   $addhistory->updated_at = date('Y-m-d H:i:s');
           $addhistory->save(); 
        return view('purchase-history.done');
    }
}
