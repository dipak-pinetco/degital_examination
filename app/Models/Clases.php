<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clases extends Model
{
    use HasFactory, SoftDeletes;

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
