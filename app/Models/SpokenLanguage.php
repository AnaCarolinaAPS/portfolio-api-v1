<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    protected $fillable = [
        'user_id',
        'language_id',
        'level_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function level()
    {
        return $this->belongsTo(LanguageLevel::class, 'level_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
