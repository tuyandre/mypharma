<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['medecine_id','quantity','date'];

    public function Medecine()
    {
        return $this->belongsTo('App\Medecine','medecine_id');
    }
}
