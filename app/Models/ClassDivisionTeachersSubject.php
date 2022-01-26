<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassDivisionTeacherSubject extends Model
{
    use HasFactory, SoftDeletes;

    public function class_teacher_subject()
    {
        return $this->belongsTo(ClassTeacherSubject::class);
    }

    public function class_division()
    {
        return $this->belongsTo(ClassDivision::class);
    }
}
