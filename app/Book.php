<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin', 'id', 'admin_id');
    }
    public function carts()
    {
        return $this->hasMany('App\Cart', 'book_id', 'id');
    }
}
