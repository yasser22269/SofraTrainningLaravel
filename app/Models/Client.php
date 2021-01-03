<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Client extends Authenticatable
{
    use Notifiable;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable =
    array('name', 'email', 'phone', 'password', 'address_id');
    protected $hidden = array('password', 'api_token', 'active_Admin');

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
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
