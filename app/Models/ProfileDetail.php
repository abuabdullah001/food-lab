<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
        protected $fillable = [
        'user_id',
        'dob',
        'national_insurance_number',
        'nationality',
    ];
}
