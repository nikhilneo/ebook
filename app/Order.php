<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'book_id','order_id','quantity'
    ];
    public function books()
    {
        return $this->belongsToMany('App\Book')->withPivot('quantity');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
