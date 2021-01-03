<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses';
    public $timestamps = false;
    protected $fillable = array('name',"city_id");

    public function cities()
    {
        return $this->belongsTo('App\Models\City',"city_id");
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }

}
