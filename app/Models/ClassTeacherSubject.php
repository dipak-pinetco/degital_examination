<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassTeacherSubject extends Model
{
    use HasFactory, SoftDeletes;

    public function class_subject()
    {
        return $this->belongsTo(ClassSubject::class);
    }

    public function teacher_subject()
    {
        return $this->belongsTo(TeacherSubject::class);
    }
}
