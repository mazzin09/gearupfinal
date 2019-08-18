<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function purchase(){
        return $this->hasMany(Purchase::class);
    }

    public function temppos(){
        return $this->belongsTo('App\Temppos');
    }
}
