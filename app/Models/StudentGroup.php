<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
