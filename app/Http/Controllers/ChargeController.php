<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChargeHistory;
use App\User;

class ChargeController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return view('charge.index', ['users' => $users]);
    }

    public function store(Request $request) {
        $charge_history = new ChargeHistory();

        $charge_history->user_id = $request->id;
        $charge_history->deposit = $request->deposit;

        $charge_history->save();

        return $this->index();
    }
}
