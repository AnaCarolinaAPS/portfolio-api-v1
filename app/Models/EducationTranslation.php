<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationTranslation extends Model
{
    protected $fillable = [
        'education_id',
        'locale_id',
        'degree',
        'institution',
        'observation',
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
