<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Order;
use App\Sold;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function myOrder(){
        $order=Order::with(['Pharmacy','Sold'=>function($query){
            $query->with(['Medecine']);
        }])->where('user_id','=',Auth::user()->id)->get();
        return view('patient.myOrder')->with('orders',$order);
    }
    public function cancelOrder($id){
        $ord=Order::find($id);
        if ($ord){
            $ord->status="cancel";
            $ord->save();
            $order=Order::with(['Pharmacy','Sold'=>function($query){
                $query->with(['Medecine']);
            }])->where('user_id','=',Auth::user()->id)->get();
            return back()->with('orders',$order);
        }

    }
    public function checkoutPending(Request $request)
    {
        if (Auth::check()) {
            $datas = $request->get('data');
            $solds=json_decode($datas);

            $order = new Order();
            $order->date=Carbon::now();
            $order->user_id = Auth::user()->id;
            $order->pharmacy_id = $solds[0]->pharmacy;
            $order->total_medecines = $request->get('count');
            $order->cost = $request->get('cost');
            $order->save();
            if (is_array($solds) || is_object($solds))
            {
                foreach ($solds as $sold) {
                    $sol = new Sold();
                    $sol->order_id = $order->id;
                    $sol->user_id = Auth::user()->id;
                    $sol->medecine_id = $sold->product;
                    $sol->medecine_quantity = $sold->count;
                    $sol->cost = $sold->total;
                    $sol->price = $sold->price;
                    $sol->save();

                }}
            else{
                return response()->json(['checkout' => "not"], 200);
            }
            return response()->json(['checkout' => "ok", 'order' => $order->id], 200);
        } else {
            return view('auth.login');
        }
    }
}
