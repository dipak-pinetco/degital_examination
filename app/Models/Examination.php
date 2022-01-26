<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;

    public function examination_group()
    {
        return $this->belongsTo(ExaminationGroup::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function examination()
    {
        return $this->morphTo();
    }

    public function supervision_teacher()
    {
        return $this->belongsTo(Teacher::class, 'id', 'supervision_teacher_id');
    }
}
