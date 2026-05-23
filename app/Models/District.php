<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name_en',
        'name_ml',
        'investment',
        'projects_count',
        'highlight_ml',
        'highlight_en',
        'x',
        'y',
    ];
}
