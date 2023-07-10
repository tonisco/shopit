<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'position',
        'title',
        'top_text',
        'bottom_text',
        'status',
        'btn_url',
    ];
}
