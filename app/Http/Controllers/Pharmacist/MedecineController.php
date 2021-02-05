<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Medecine;
use App\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $medecine = Medecine::with(['Pharmacy'])->get();
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
