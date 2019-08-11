<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function subcategoires(){
        return $this->hasMany(Subcategory::class);
    }
    public function items(){
        return $this->belongsTo(Item::class);
    }
}
