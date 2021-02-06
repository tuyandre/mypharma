<?php

namespace App\Http\Controllers;

use App\Medecine;
use App\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function about_us(){
        return view('pages.aboutus');
    }
    public function medicineDetail($id){
        $medicine=Medecine::with(['Pharmacy'])->where('id','=',$id)->first();
        return view('pages.medicineDetail')->with('medicine',$medicine);
    }
    public function medicines(){
        return view('pages.medecines');
    }
   public function multipleexplode ($delimiters,$string) {
        $phase = str_replace($delimiters, $delimiters[0], $string);
        $processed = explode($delimiters[0], $phase);
        return  $processed;
    }

    public function searchMedecine(Request $request){
        $circle_radius = 3959;
        $max_distance = 20;
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $input=$request['medicines'];

        $data =FrontController::multipleexplode(array(",",".","|",":",";"," "),$input);
        $size=count($data);
        $nearest = DB::table('medecines')
            ->join('pharmacies', 'pharmacies.id', '=', 'medecines.pharmacy_id')
            ->select(
                DB::raw(" medecines.*, pharmacies.name AS pharmacy_name, pharmacies.location AS location, pharmacies.latitude, pharmacies.longitude,
                              ( 3959 * acos( cos( radians($lat) ) *
                                cos( radians( pharmacies.latitude ) )
                                * cos( radians( pharmacies.longitude ) - radians($lng)
                                ) + sin( radians($lat) ) *
                                sin( radians( pharmacies.latitude ) ) )
                              ) AS distance
                              "))
            ->where(function($query) use ($data,$size){
                $query->where('medecines.name', 'LIKE', '%' . $data[0] . '%')
                    ->orWhere(function($query) use ($data,$size) {
                        for ($i=1;$i<$size;$i++) {
                            $query->where('medecines.name', 'LIKE', '%' . $data[$i] . '%');
                        }
                    });

            })
            ->orderBy("distance")
            ->groupBy("medecines.id")
            ->get();
        return view('patient.resultMedecine')->with('medicines',$nearest);
//        ->having("distance", "<=", $max_distance)
        return response()->json(['results' => $nearest], 200);
    }
    public function pharmacyLocation($pharmacy){
        $pharmacies=Pharmacy::find($pharmacy);
//        return response()->json(['results' => $pharmacies], 200);
        return view('patient.pharmacyLocation')->with('pharmacy',$pharmacies);
    }
    public function cart(){
        return view('pages.cart');
    }
    public function checkout(Request $request){
        return view('pages.checkout');
    }
}
