<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Medecine;
use App\Pharmacy;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('Pharmacist.auth');
    }
    public function store(Request $request){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();

        $date=Carbon::now();
        $newStock = Stock::create([
            'pharmacy_id' => $pharma->id,
            'medecine_id' => $request['medecine'],
            'quantity' => $request['quantity'],
            'date' => $date
        ]);
        if ($newStock){
            $medecine=Medecine::find($newStock->medecine_id);
            if ($medecine){
                $pr=$medecine->quantity;
                $medecine->quantity=($pr+$newStock->quantity);
                $medecine->save();
                return response()->json(['stock' => "ok"], 200);
            }
            return response()->json(['stock' => "not"], 200);
        }
    }
}
