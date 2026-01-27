<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'locale_default',
        'api_key',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function defaultLocale()
    {
        return $this->belongsTo(Locale::class, 'locale_default');
    }

    // Retorna sempre os ativos primeiro em ordem alfabetica
    public function profiles()
    {
        return $this->hasMany(Profile::class)
            ->join('locales', 'profiles.locale_id', '=', 'locales.id')
            ->orderByDesc('profiles.is_active')
            ->orderBy('locales.code')
            ->select('profiles.*');
    }

    public function currentProfile()
    {
        return $this->profiles->firstWhere('id', session('current_profile_id'));
    }

    public function languages()
    {
        return $this->hasMany(SpokenLanguage::class);
    }
}
