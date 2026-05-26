<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineMilestone extends Model
{
    protected $fillable = [
        'year',
        'phase_ml',
        'phase_en',
        'desc_ml',
        'desc_en',
        'government_en',
        'government_ml',
        'stats_en',
        'stats_ml',
        'icon',
    ];
}
