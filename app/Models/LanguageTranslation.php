<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageTranslation extends Model
{
    protected $fillable = [
        'language_id',
        'locale_id',
        'name',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
