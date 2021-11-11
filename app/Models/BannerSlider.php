<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSlider extends Model
{
    public $timestamps = false; // ko có dòng này sẽ lỗi
    protected $fillable = [
        'SliderName', 'SliderImage', 'SliderStatus', 'CreatedAt', 'UpdatedAt'
    ];
    protected $primaryKey = 'SliderId';
    protected $table = 'BannerSlider';
}
