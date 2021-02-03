<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Insurance;
use App\Medecine;
use App\Pharmacy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('Admin.auth');
    }
    public function index()
    {
        return view('admin.pharmacy');
    }
    public function getPharmacy(){
        $pha=Pharmacy::with(['User'])->get();
        return response()->json(['pharmacy' => $pha], 200);
    }
    public function store(Request $request)
    {
        $newPharmacy = Pharmacy::create([
            'name' => $request['name'],
            'location' => $request['location'],
            'description' => $request['description'],
            'latitude' => $request['latitude'],
            'longitude' => $request['longitude']
        ]);
        if ($newPharmacy) {
            return response()->json(['pharmacy' => "ok"], 200);
        }else{
            return response()->json(['lost' => "not",'sms'=>$newPharmacy], 200);
        }
    }
    public function registerPharmacist(Request $request){
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_no' => $request['phone_no'],
            'role' => "Pharmacist",
            'password' => Hash::make($request['password']),
        ]);
        if ($user) {
            $updatePharmacy = Pharmacy::where('id', $request['pharmacy'])->update([
                'user_id' => $user->id
            ]);
            if ($updatePharmacy) {
                return response()->json(['pharmacist' => "ok"], 200);
            }else{
                return response()->json(['pharmacist' => "not"], 200);
            }
        }
    }
    public function pharmacist()
    {
        return view('admin.pharmacist');
    }
    public function getPharmacist(){
        $pharmacist = User::with(['Pharmacy'])->where('role','=','Pharmacist')->get();
        return response()->json(['pharmacist' => $pharmacist], 200);
    }
    public function patient()
    {
        return view('admin.patient');
    }
    public function getPatient(){
        $patient = User::where('role','=','Patient')->get();
        return response()->json(['patient' => $patient], 200);
    }
    public function medecines()
    {
        return view('admin.medecines');
    }
    public function getMedecines(){
        $medecine = Medecine::with(['Pharmacy'])->get();
        return response()->json(['medecine' => $medecine], 200);
    }
    public function insurances()
    {
        return view('admin.insurances');
    }
    public function getInsurances(){
        $insurance = Insurance::with(['Pharmacy'])->get();
        return response()->json(['insurance' => $insurance], 200);
    }
    public function show($id){
        $pha=Pharmacy::find($id);
        if ($pha){
            return response()->json(['pharmacy' => $pha], 200);
        }
    }
    public function update(Request $request){
        $pha=Pharmacy::find($request['id']);
        if ($pha){
            $pha->name=$request['name'];
            $pha->description=$request['description'];
            $pha->location=$request['location'];
            $pha->latitude=$request['latitude'];
            $pha->longitude=$request['longitude'];
            $pha->save();
            return response()->json(['pharmacy' => "ok"], 200);
        }
    }
    public function delete($id){
        $pha=Pharmacy::find($id);
        if ($pha){
            $pha->delete();
            return response()->json(['pharmacy' => 'ok'], 200);
        }
    }
}
