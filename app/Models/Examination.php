<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;

    const PAGINATION_COUNT = 10;

    protected $dates = [
        'start_datetime',
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

    function getTotalTimeAttribute($value)
    {
        return gmdate("H:i", $value * 60);
    }
}
