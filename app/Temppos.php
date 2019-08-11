<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temppos extends Model
{
    public function Product(){
        return $this->belongsTo('App/Item');
    }
}
