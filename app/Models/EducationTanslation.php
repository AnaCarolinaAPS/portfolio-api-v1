<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationTransaltion extends Model
{
    protected $fillable = [
        'education_id',
        'locale_id',
        'degree',
        'institution',
        'note',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
