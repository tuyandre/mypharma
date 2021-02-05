<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medecine extends Model
{
    protected $fillable = ['name', 'image', 'description', 'price', 'quantity', 'pharmacy_id'];

    public function Pharmacy()
    {
        return $this->belongsTo('App\Pharmacy', 'pharmacy_id');
    }
    public function Sold()
    {
        return $this->hasMany('App\Sold');
    }
    public function Stock()
    {
        return $this->hasMany('App\Stock');
    }
}
