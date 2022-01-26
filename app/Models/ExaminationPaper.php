<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminationPaper extends Model
{
    use HasFactory, SoftDeletes;

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }

    public function class_teacher_subject()
    {
        return $this->belongsTo(ClassTeacherSubject::class);
    }
}
