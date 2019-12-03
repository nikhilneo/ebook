<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Orders()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }
    
    public function Carts()
    {
        return $this->hasMany('App\Cart', 'user_id', 'id');
    }
    
    public function Wishlists()
    {
        return $this->hasMany('App\Wishlist', 'user_id', 'id');
    }
}
