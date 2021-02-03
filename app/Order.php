<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['total_medecines','pharmacy_id','cost','user_id','date','status'];
    public function Sold()
    {
        return $this->hasMany('App\Sold','order_id');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Pharmacy()
    {
        return $this->belongsTo('App\Pharmacy','pharmacy_id');
    }
}
