<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeMajor extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function degree(){
        return $this->belongsTo(Degree::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }


}
