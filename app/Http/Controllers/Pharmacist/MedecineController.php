<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Medecine;
use App\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedecineController extends Controller
{
    public function __construct()
    {
        $this->middleware('Pharmacist.auth');
    }
    public function index()
    {
        return view('pharmacist.medecines');
    }
    public function getMedecines(){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();
        $medecine = Medecine::with(['Pharmacy'])->where('pharmacy_id','=',$pharma->id)->get();
        return response()->json(['medecine' => $medecine], 200);
    }
    public function show($id){
        $medicine=Medecine::find($id);
        if ($medicine){
            return response()->json(['medicine' => $medicine], 200);
        }
    }
    public function update(Request $request){
        $medicine=Medecine::find($request['id']);
        if ($medicine){
            $medicine->name=$request['name'];
            $medicine->price=$request['price'];
            $medicine->description=$request['description'];
            $medicine->save();
            return response()->json(['medicine' => 'ok'], 200);
        }else{
            return response()->json(['medicine' => 'not'], 404);
        }
    }
    public function store(Request $request){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();
        $check=Medecine::where('pharmacy_id','=',$pharma->id)->where('name','=',$request['name'])->first();
        if ($check){
            return response()->json(['medicine' => "exist"], 200);
        }

        $file=$request->file('photo');
        $filename =time().$file->getClientOriginalName();
        $file->move(public_path('backend/medecines'),$filename);
        $newMedecine = Medecine::create([
            'image' => $filename,
            'pharmacy_id' => $pharma->id,
            'name' => $request['name'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'description' => $request['description']
        ]);
        if ($newMedecine){
            return response()->json(['medicine' => "ok"], 200);
        }
    }


    public function delete($id){
        $medecine=Medecine::find($id);
        if ($medecine){
            $medecine->delete();
            return response()->json(['medicine' => 'ok'], 200);
        }
    }
}
