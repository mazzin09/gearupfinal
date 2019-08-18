<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temppos extends Model
{
    public function Item(){
        return $this->hasMany('App\Item');
    }
}
