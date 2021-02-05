<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Medecine;
use App\Order;
use App\Pharmacy;
use App\Sold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('Pharmacist.auth');
    }
    public function index()
    {
        return view('pharmacist.order');
    }
    public function getOrders(){
        $pharma=Pharmacy::where('user_id','=',Auth::user()->id)->first();
        $order = Order::with(['Pharmacy','User'])->where('pharmacy_id','=',$pharma->id)->get();
        return response()->json(['order' => $order], 200);
    }
    public function detail($id){
        $order=Order::with(['Sold'=>function($query){
            $query->with(['Medecine']);
        },'User'])->where('id','=',$id)->get();
        if ($order){
            return view('pharmacist.orderDetail')->with('orders',$order);
        }
    }
    public function complete($id){
        $order=Order::find($id);
        if ($order){
            $order->status="Complete";
            $order->save();
            $solds=Sold::where('order_id','=',$order->id)->get();
            foreach ($solds as $sold){
                $medicine=Medecine::find($sold->medecine_id);
                if ($medicine){
                    $prev=$medicine->quantity;
                    $medicine->quantity=($prev-$sold->medecine_quantity);
                    $medicine->save();
                    return response()->json(['order' => 'ok'], 200);
                }
            }
            return response()->json(['order' => 'not'], 200);
        }
    }
}
