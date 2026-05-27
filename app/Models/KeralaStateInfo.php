<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeralaStateInfo extends Model
{
    protected $table = 'kerala_state_infos';

    protected $fillable = [
        'state_name',
        'formed_on',
        'capital',
        'official_language',
        'legislature',
        'high_court',
        'current_governor',
        
        // Important Records
        'first_cm',
        'first_communist_cm_in_india',
        'only_muslim_cm',
        'longest_serving_leaders',

        // Current Government details
        'current_cm_name',
        'current_cm_party',
        'current_cm_alliance',
        'current_cm_sworn_in',
        'current_cm_status',
    ];

    protected $casts = [
        'longest_serving_leaders' => 'array',
    ];
}
