<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'category_ml',
        'category_en',
        'title_ml',
        'title_en',
        'district_ml',
        'district_en',
        'description_ml',
        'description_en',
        'investment',
        'percentage',
        'before_text_ml',
        'before_text_en',
        'after_text_ml',
        'after_text_en',
        'before_img',
        'after_img',
    ];
}
