<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
}
