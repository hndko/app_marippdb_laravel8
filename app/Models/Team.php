<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'bio',
        'twitter_link',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
