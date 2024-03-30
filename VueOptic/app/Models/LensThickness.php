<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LensThickness extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'price'];

    
    public function lenses()
    {
        return $this->hasMany(Lenses::class);
    }
}
