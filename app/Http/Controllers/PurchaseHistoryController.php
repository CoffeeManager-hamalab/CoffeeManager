<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Capsule;
use App\PurchaseHistory;

class PurchaseHistoryController extends Controller
{
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
}
