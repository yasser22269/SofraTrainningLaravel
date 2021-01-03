<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = array('title', 'content', 'price',"restaurant_id","price_offer","Photo");

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
    // public function category()
    // {
    //     return $this->belongsTo('App\Models\Category');
    // }

}
