<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageLevel extends Model
{
    protected $fillable = [
        'code',
    ];

    public function translations()
    {
        return $this->hasMany(LanguageLevelTranslation::class);
    }

    public function translate(string $code)
    {
        return $this->translations()
                    ->whereHas('locale', function ($q) use ($code) {
                        $q->where('code', $code);
                    })
                    ->first()->name ?? $this->code;
    }
}
