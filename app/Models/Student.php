<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'date_of_birth',
        'gender',
        'phone',
        'address',
        'email',
        'password',
        'semester_major',
        'major_id',
        'degree_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function getGenderNameAttribute()
    {
        return GenderEnum::getKey($this->gender);
    }

}
