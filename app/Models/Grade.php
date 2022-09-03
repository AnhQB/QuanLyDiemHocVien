<?php

namespace App\Models;

use App\Enums\ExamTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'exam_type',
        'semester_year',
        'time',
        'grade',
        'status',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function exam_type()
    {
        return $this->belongsTo(Subject::class,'exam_type');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }


}
