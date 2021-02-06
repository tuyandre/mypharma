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

        $check=Insurance::where('pharmacy_id','=',$pharma->id)->where('name','=',$request['name'])->first();
        if ($check){
            return response()->json(['insurance' => "exist"], 200);
        }

        $newInsurance = Insurance::create([
            'pharmacy_id' => $pharma->id,
            'name' => $request['name']
        ]);
        if ($newInsurance){
            return response()->json(['insurance' => "ok"], 200);
        }
    }
    public function show($id){
        $insurance=Insurance::find($id);
        if ($insurance){
            return response()->json(['insurance' => $insurance], 200);
        }
    }
    public function update(Request $request){
        $insurance=Insurance::find($request['id']);
        if ($insurance){
            $insurance->name=$request['name'];
            $insurance->save();
            return response()->json(['insurance' => 'ok'], 200);
        }else{
            return response()->json(['insurance' => 'not'], 404);
        }
    }
    public function delete($id){
        $insurance=Insurance::find($id);
        if ($insurance){
            $insurance->delete();
            return response()->json(['insurance' => 'ok'], 200);
        }
    }
}
