<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'from', 'to', 'restaurant_id',"Photo");

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

}
