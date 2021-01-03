<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = false;
    protected $fillable = array('about_us', 'commission', 'accounts_bank');

}