<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'image',
        'name',
        'phone',
        'email',
        'address',
        'user_id'
       ];

       public function user()
       {
           return $this->belongstTo ('App\User', 'user_id');
       }
}
