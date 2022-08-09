<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{

    use HasFactory;

    public $incrementing = false;
   // protected $primaryKey = ['id', 'subject_id'];

    protected $fillable = [
        'id',
        'subject_id',
        'degree_id',
        'major_id',
    ];

    public function degree(){
        return $this -> belongsTo(Degree::class);
    }

    public function major(){
        return $this -> belongsTo(Major::class);
    }

    public function subject(){
        return $this -> belongsTo(Subject::class);
    }

//    public function getSubjectNameAttribute(){
//        $subject_id = $this -> subject_id;
//
//        $arr_subject_id = explode(',', $subject_id);
//        $arr_subject_name = '';
//        foreach ($arr_subject_id as $each){
//            $subject_name = Subject::query()
//                            ->select('name')
//                            ->where('id',$each)
//                            ->first();
//            if(count($arr_subject_name) > 1){
//                $arr_subject_name .= " - ";
//            }
//            $arr_subject_name += $subject_name;
//        }
//
//    }

//    public function subjectGroups(): HasMany
//    {
//        return $this->hasMany(self::class, 'id', 'subject_id');
//    }
}
