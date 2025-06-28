<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable=[
        'user_id',
        'dob',
        'national_insurance_number',
        'nationality',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
