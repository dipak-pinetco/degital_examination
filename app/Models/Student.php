<?php

namespace App\Models;

use App\Traits\AuthModelHelper;
use App\Traits\Enums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Storage;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Enums, SoftDeletes, AuthModelHelper;

    protected $guard_name  = 'student';

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
        'status',
        'avatar',
        'gr_number',
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
        'date_of_birth' => 'date:Y-m-d',
        'email_verified_at' => 'datetime',
    ];
}
