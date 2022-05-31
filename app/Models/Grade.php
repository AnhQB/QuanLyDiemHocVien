<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function subject_id()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function exam_type()
    {
        return $this->belongsTo(Subject::class,'exam_type');
    }
}
