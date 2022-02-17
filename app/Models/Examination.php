<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\GenderTypes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;

    const PAGINATION_COUNT = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'examination_group_id',
        'academic_year_id',
        'supervision_teacher_id',
        'name',
        'start_date_time',
        'total_time',
        'total_marks',
        'passout_marks',
    ];

    protected $dates = [
        'start_date_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date_time' => 'datetime',
    ];

    /**
     * Get the examinationGroup that owns the Examination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examinationGroup(): BelongsTo
    {
        return $this->belongsTo(ExaminationGroup::class);
    }

    /**
     * Get the academicYear that owns the Examination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    /**
     * Get the supervisionTeacher that owns the Examination
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supervisionTeacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'supervision_teacher_id', 'id');
    }

    public function examinationable(): MorphTo
    {
        return $this->morphTo();
    }

    function getTotalTimeConvertAttribute()
    {
        return gmdate("H:i", $this->total_time * 60);
    }
}
