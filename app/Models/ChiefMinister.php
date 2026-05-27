<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiefMinister extends Model
{
    protected $table = 'chief_ministers';

    protected $fillable = [
        'no',
        'name',
        'party',
        'tenure',
    ];
}
