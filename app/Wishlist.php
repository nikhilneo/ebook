<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "wishlist";
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function book()
    {
        return $this->hasOne('App\Book', 'id', 'book_id');
    }
}
