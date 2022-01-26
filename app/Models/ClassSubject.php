<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSubject extends Model
{
    use HasFactory, SoftDeletes;

    public function class()
    {
        return $this->belongsTo(Clases::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
