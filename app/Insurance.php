<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
//    use HasFactory;
    protected $fillable = ['name', 'pharmacy_id'];

    public function Pharmacy()
    {
        return $this->belongsTo('App\Pharmacy', 'pharmacy_id');
    }
}
