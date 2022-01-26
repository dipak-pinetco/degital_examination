<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClassExamination extends Model
{
    use HasFactory, SoftDeletes;

    public function student_class()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
