<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $fillable = [
        'title', 'subtitle', 'description_1', 'description_2', 
        'years_experience', 'master_chefs'
    ];
}
