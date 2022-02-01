<?php

namespace App\Models;

use App\Traits\Enums;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Enums;

    const PAGINATION_COUNT = 10;
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';
    const GENDER_OTHER = 'Other';

    protected $enumGenders = [User::GENDER_MALE, User::GENDER_FEMALE, User::GENDER_OTHER];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school_id',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'password',
        'mobile',
        'userable_id',
        'userable_type',
        'status',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'email_verified_at' => 'datetime',
    ];

    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getAvatarAttribute()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case '1':
                return 'Active';
                break;
            case '0':
                return 'Block';
                break;
            case '2':
                return 'Draft';
                break;
        }
    }

    /**
     * Get the school that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
