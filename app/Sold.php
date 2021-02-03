<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $table = 'solds';
    protected $fillable = ['order_id','cost','price','medecine_id','medecine_quantity','user_id'];
    public function Order()
    {
        return $this->belongsTo('App\Order','order_id');
    }
    public function Medecine()
    {
        return $this->belongsTo('App\Medecine','medecine_id');
    }
}
