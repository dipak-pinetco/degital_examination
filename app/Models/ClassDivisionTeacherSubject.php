<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassDivisionTeacherSubject extends Model
{
    use HasFactory, SoftDeletes;

    // /**
    //  * Get the class_teacher_subject that owns the ClassDivisionTeacherSubject
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function class_teacher_subject(): BelongsTo
    // {
    //     return $this->belongsTo(ClassTeacherSubject::class);
    // }

    // /**
    //  * Get the class_division that owns the ClassDivisionTeacherSubject
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function class_division(): BelongsTo
    // {
    //     return $this->belongsTo(ClassDivision::class);
    // }
}
