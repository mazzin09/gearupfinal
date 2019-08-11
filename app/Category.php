<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategoires(){
        return $this->hasMany(Subcategory::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
    public function purchase(){
        return $this->hasMany(Purchase::class);
    }
}
