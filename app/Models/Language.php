<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'code',
    ];

    public function locales()
    {
        return $this->hasMany(Locale::class);
    }

    public function translations()
    {
        return $this->hasMany(LanguageTranslation::class);
    }
}
