<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;    

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;


protected $fillable = [
    'name', 'last_name', 'shop_name', 'email', 'phone', 'password', 
    'street', 'city', 'post_code', 'flat_house_no', 'user_type', 'otp', 'otp_expires_at',
    'is_verified', 'shop_status', 'email_verified_at', 'account_delete_comment',
    'latitude', 'longitude', 'image',
];



protected $hidden = [
    'password', 'confirm_password', 'otp', 'remember_token',
];


protected $casts = [
    'email_verified_at' => 'datetime',
    'otp_expires_at' => 'datetime',
    'is_verified' => 'boolean',
    'latitude' => 'decimal:8',
    'longitude' => 'decimal:8',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
];

public function setPasswordAttribute($value)
{
    if (Hash::needsRehash($value)) {
        $this->attributes['password'] = Hash::make($value);
    } else {
        $this->attributes['password'] = $value;
    }
}





}
