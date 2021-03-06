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

        // 日付・カプセルごとに集計
        $history = DB::table('purchase_histories')
                    ->join('capsules', 'purchase_histories.capsule_id', '=', 'capsules.id')
                    ->select('capsules.name', DB::raw('sum(purchase_histories.quantity * purchase_histories.price) as price'), DB::raw('sum(purchase_histories.quantity) as sum_quantity'), DB::raw('date_format(purchase_histories.created_at, "%Y%m%d") as date'))
                    ->where('purchase_histories.user_id', '=', $user->id)
                    ->groupBy('capsules.id', DB::raw('date_format(purchase_histories.created_at, "%Y%m%d")'))
                    ->latest('date')
                    ->orderBy('capsules.id', 'ASC')
                    ->get();

        $group_date = new Carbon(Carbon::maxValue());
        $ret = [];
        $tmp = [];

        // 日付ごとに配列を分割
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

        // $retには$tmpの初期となる空行が入るのでarray_shiftで除外
        array_shift($ret);


        // 請求額の計算
        $charge = DB::table('charge_histories')
                    ->where('user_id', '=', $user->id)
                    ->sum('deposit');

        $bill = DB::table('purchase_histories')
                    ->where('user_id', '=', $user->id)
                    ->sum(DB::raw('quantity * price'));

        $bill_amount = $bill - $charge;

        return view('purchase-history.index', ['histories' => $ret, 'bill' => $bill_amount]);
    }

    public function create() {
        return view('article.create');
    }

    public function complete(Request $request){
	    $addhistory = new PurchaseHistory;
	   $addhistory->user_id = Auth::user()->id;
	   $addhistory->capsule_id = $request->id;
	   $addhistory->quantity = 1;
	   $addhistory->price = $request->price;
	   $addhistory->created_at = date('Y-m-d H:i:s');
	   $addhistory->updated_at = date('Y-m-d H:i:s');
           $addhistory->save();
        return view('purchase-history.done');
    }
}
