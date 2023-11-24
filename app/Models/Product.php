<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getPhotoAttribute(){
        return asset('storage/' . $this->image);
    }

    function category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
