<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                    ->select('capsules.name', 'capsules.price', DB::raw('sum(purchase_histories.quantity) as sum_quantity'), DB::raw('date_format(purchase_histories.created_at, "%Y%m%d") as date'))
                    ->where('purchase_histories.user_id', '=', $user->id)
                    ->groupBy('capsules.id', DB::raw('date_format(purchase_histories.created_at, "%Y%m%d")'))
                    ->latest('date')
                    ->get();

        $group_date = new Carbon(Carbon::now());
        $ret = [];
        $tmp = [];
        foreach ($history as $data) {
            $carbon_date = new Carbon($data->date);
            if (!$group_date->isSameDay($carbon_date)) {
                $ret[] = $tmp;
                $group_date = new Carbon($data->date);
                $tmp = [
                    'purchase' => [],
                    'date' => $data->date
                ];
            }
            $tmp['purchase'][] = $data;
        }
        $ret[] = $tmp;
        array_shift($ret);
        return view('purchase-history.index', ['histories' => $ret]);
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
