<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Capsule;
use App\ImportHistory;


class ImportHistoryController extends Controller
{
    //
    public function index()
    {
        $capsules = Capsule::all();
        $import_histories = DB::table('import_histories')
                                ->join('capsules', 'import_histories.capsule_id', '=', 'capsules.id')
                                ->select('import_histories.*', 'capsules.name')
                                ->orderBy('import_histories.created_at', 'desc')
                                ->get();

        return view('import-history.index', ['capsules' => $capsules, 'histories' => $import_histories]);
    }

    public function store(Request $request) {
        $import_history = new ImportHistory();

        $import_history->capsule_id = $request->id;
        $import_history->quantity = $request->quantity;

        $import_history->save();

        return view('import-history.store');
    }
}
