<?php

namespace App\Models;

use App\Enums\ExamTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'exam_type',
    ];

    public function getExamTypeNameAttribute(): string
    {
        return ExamTypeEnum::getKey($this -> exam_type);
    }

}
