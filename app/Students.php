<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'phone',
        'address',
        
       ];

       public function user()
       {
           return $this->belongstTo('App\User');
       }
}
