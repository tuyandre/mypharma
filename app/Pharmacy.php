<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
//    use HasFactory;
    protected $fillable = ['name', 'location', 'description','latitude','longitude', 'user_id'];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function Insurance()
    {
        return $this->hasMany('App\Insurance');
    }
    public function Medecine()
    {
        return $this->hasMany('App\Medecine');
    }
}
