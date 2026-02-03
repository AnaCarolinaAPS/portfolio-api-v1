<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function translations()
    {
        return $this->hasMany(EducationTranslation::class);
    }

    public function translate(string $code)
    {
        return $this->translations()
                    ->whereHas('locale', function ($q) use ($code) {
                        $q->where('code', $code);
                    })
                    ->first() ?? null;
    }
}
