<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'group_id',
        'subject_id',
        'student_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
