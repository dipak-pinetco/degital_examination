<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;

    // /**
    //  * Get the examination_group that owns the Examination
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function examination_group(): BelongsTo
    // {
    //     return $this->belongsTo(ExaminationGroup::class);
    // }

    // /**
    //  * Get the academic_year that owns the Examination
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function academic_year(): BelongsTo
    // {
    //     return $this->belongsTo(AcademicYear::class);
    // }


    // public function examination()
    // {
    //     return $this->morphTo();
    // }

    // /**
    //  * Get the supervision_teacher that owns the Examination
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function supervision_teacher(): BelongsTo
    // {
    //     return $this->belongsTo(Teacher::class, 'id', 'supervision_teacher_id');
    // }
}
