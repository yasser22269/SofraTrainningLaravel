<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Restaurant  extends Authenticatable
{
    use Notifiable;

    protected $table = 'restaurants';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'photo', 'address_id', 'delivery_cost', 'min_order', 'category_id','password' ,'whats_app');
    protected $hidden = array('password', 'api_token');

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function city()
    {
        return $this->hasMany('App\Models\City');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function offer()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function notifications()
    {
        return $this->morphMany('App\Models\Notification','notifationable');
    }

    public function tokens()
    {
        return $this->morphMany('App\Models\Token', 'accountable');
    }

}
