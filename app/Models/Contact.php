<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'phone', 'email', 'facebook', 'instagram', 'twitter', 'youtube'];

    protected $casts = [
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'twitter' => 'string',
        'youtube' => 'string',
    ];
}

