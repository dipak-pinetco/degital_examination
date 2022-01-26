<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClass extends Model
{
    use HasFactory, SoftDeletes;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class_division()
    {
        return $this->belongsTo(ClassDivision::class);
    }
}
