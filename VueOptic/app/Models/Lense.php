<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lense extends Model
{
    use HasFactory;

    protected $fillable = ['glasses_id', 'vision_need_id', 'image', 'lens_type_id', 'lens_thickness_id', 'lens_performance_id'];

    public function glasses()
    {
        return $this->belongsTo(Glasse::class);
    }

    public function visionNeed()
    {
        return $this->belongsTo(VisionNeed::class);
    }

    public function lensType()
    {
        return $this->belongsTo(LensType::class);
    }

    public function lensThickness()
    {
        return $this->belongsTo(LensThickness::class);
    }

    public function lensPerformance()
    {
        return $this->belongsTo(LensPerformance::class);
    }
}
