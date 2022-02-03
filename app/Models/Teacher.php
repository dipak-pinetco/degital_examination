<?php

namespace App\Models;

use App\Traits\Enums;
use Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Teacher extends Model
{
    use HasFactory, SoftDeletes, Enums;

    const PAGINATION_COUNT = 10;
    const GENDER_MALE = 'Male';
    const GENDER_FEMALE = 'Female';
    const GENDER_OTHER = 'Other';

    protected $enumGenders = [Teacher::GENDER_MALE, Teacher::GENDER_FEMALE, Teacher::GENDER_OTHER];

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
        'mobile',
        'status',
        'avatar',
        'degree',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date:Y-m-d',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updating(function ($teacher) {
            $updateFiled = Arr::except($teacher->getDirty(), ['degree']);
            $teacher->user()->update($updateFiled);
        });
        
        static::deleting(function ($teacher) {
            $teacher->user()->delete();
        });
    }

    /**
     * Get the user that owns the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Get the school that owns the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function getAvatarPathAttribute()
    {
        return is_null($this->avatar) ? 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp&f=y' : Storage::url($this->avatar);
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
}
