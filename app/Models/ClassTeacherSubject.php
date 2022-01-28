<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassTeacherSubject extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the class_subject that owns the ClassTeacherSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class_subject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class);
    }

    /**
     * Get the teacher_subject that owns the ClassTeacherSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher_subject(): BelongsTo
    {
        return $this->belongsTo(TeacherSubject::class);
    }
}
