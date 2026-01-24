<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'profile_id',
        'headline',
        'title',
        'summary',
        'about_me',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
