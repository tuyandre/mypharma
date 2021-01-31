<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getRegister(){
        return view('auth.adminRegister');
    }
    public function registerAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_no' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        if (!$validator){
            return $validator;
        }
        $user= User::create([
            'name' => $request['name'],
            'phone_no' => $request['phone_no'],
            'email' => $request['email'],
            'role' => "Admin",
            'password' => Hash::make($request['password']),
        ]);
        if ($user){
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return $user;
        }
    }
}
