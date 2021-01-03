<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model 
{

    protected $table = 'tokens';
    public $timestamps = false;
    protected $fillable = array('token');

    public function accountable()
    {
        return $this->morphTo();
    }

}