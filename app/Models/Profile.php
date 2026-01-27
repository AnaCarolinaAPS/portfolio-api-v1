<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'locale_id',
        'is_active'
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class, 'locale_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function information()
    {
        return $this->hasOne(Information::class);
    }
}
