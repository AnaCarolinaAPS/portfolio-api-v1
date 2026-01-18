<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageLevelTranslation extends Model
{
    protected $fillable = [
        'language_level_id',
        'locale_id',
        'name',
    ];

    public function languageLevel()
    {
        return $this->belongsTo(LanguageLevel::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
