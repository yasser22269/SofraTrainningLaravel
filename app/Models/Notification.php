<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'body','notifationable_id', 'notifationable_type');

    public function client()
    {
        return $this->morphedByMany('App\Models\Client','notifationable');
    }

    public function Restaurant()
    {
        return $this->morphedByMany('App\Models\Restaurant','notifationable');
    }

}
