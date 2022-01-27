<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    public function academic_year()
    {
        return $this->hasMany(AcademicYear::class);
    }

    public function examination_group()
    {
        return $this->hasMany(ExaminationGroup::class);
    }

    public function class()
    {
        return $this->hasMany(Clases::class);
    }
}
