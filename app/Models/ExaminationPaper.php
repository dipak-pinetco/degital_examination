<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaper extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the examination that owns the ExaminationPaper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examination(): BelongsTo
    {
        return $this->belongsTo(Examination::class);
    }

    /**
     * Get the class_teacher_subject that owns the ExaminationPaper
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class_teacher_subject(): BelongsTo
    {
        return $this->belongsTo(ClassTeacherSubject::class);
    }
}
