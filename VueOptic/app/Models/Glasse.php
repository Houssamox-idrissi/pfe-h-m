<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glasse extends Model
{
    use HasFactory;
    protected $fillable =[
        'Model',
        'size',
        'image',
        'Price',
        'type_id',
        'category_id',
        'brand_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
    
}
