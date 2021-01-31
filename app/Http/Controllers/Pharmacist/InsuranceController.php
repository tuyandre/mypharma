<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Insurance;
use App\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('Pharmacist.auth');
    }
    public function index()
    {
        return view('pharmacist.insurances');
    }
    public function getInsurances(){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();
        $insurance = Insurance::with(['Pharmacy'])->where('pharmacy_id','=',$pharma->id)->get();
        return response()->json(['insurance' => $insurance], 200);
    }
    public function store(Request $request){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();

        $newInsurance = Insurance::create([
            'pharmacy_id' => $pharma->id,
            'name' => $request['name']
        ]);
        if ($newInsurance){
            return response()->json(['insurance' => "ok"], 200);
        }
    }
}
