<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model 
{

    protected $table = 'payments';
    public $timestamps = false;
    protected $fillable = array('name');

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

}