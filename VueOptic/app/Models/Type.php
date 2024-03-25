<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'image',
        'name',
    ];

    public function glasses()  {
        return $this->hasMany(Glasse::class);
    }
}
