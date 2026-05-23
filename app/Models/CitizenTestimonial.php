<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitizenTestimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'quote_ml',
        'quote_en',
        'rating',
        'avatar',
    ];
}
