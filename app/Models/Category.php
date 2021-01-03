<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = array('name');

    public function restaurant()
    {
        return $this->belongsToMany('App\Models\Restaurant');
    }
    // public function Products()
    // {
    //     return $this->hasMany('App\Models\Product');
    // }

}
