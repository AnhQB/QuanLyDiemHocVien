<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\MajorSubject;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Seeder;
use Psy\Exception\ErrorException;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //student major each degree
        $student_soft_1 = Student::where('major_id','1')
                        ->where('degree_id','1')
                        ->pluck('semester_major','id')
                        ->toArray();
        $student_soft_2 = Student::where('major_id','1')
                        ->where('degree_id','2')
                        ->pluck('semester_major','id')
                        ->toArray();
        $student_soft_3 = Student::where('major_id','1')
                        ->where('degree_id','3')
                        ->pluck('semester_major','id')
                        ->toArray();
        $student_design_1= Student::where('major_id','2')
                        ->where('degree_id','1')
                        ->pluck('semester_major','id')
                        ->toArray();
        $student_design_2= Student::where('major_id','2')
                        ->where('degree_id','2')
                        ->pluck('semester_major','id')
                        ->toArray();
        $student_design_3= Student::where('major_id','2')
                        ->where('degree_id','3')
                        ->pluck('semester_major','id')
                        ->toArray();
        $group_soft_degree = Group::where('major_id','1')
                        ->pluck('degree_id','id')
                        ->toArray();
        $group_soft_subject = Group::where('major_id','1')
                        ->pluck('subject_id','id')
                        ->toArray();
        $group_design_degree = Group::where('major_id','2')
                        ->pluck('degree_id','id')
                        ->toArray();
        $group_design_subject = Group::where('major_id','2')
                        ->pluck('subject_id','id')
                        ->toArray();
        $semster_subject_soft = MajorSubject::where('major_id','1')
                        ->pluck('semester_major','subject_id')
                        ->toArray();
        $semster_subject_design = MajorSubject::where('major_id','2')
                        ->pluck('semester_major','subject_id')
                        ->toArray();

        foreach($group_soft_degree as $key => $val){
            //lấy từng khóa ra
            if($val ===1){
                $numberStudent=0;
                foreach($student_soft_1 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_soft[$group_soft_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_soft_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                        }catch(ErrorException $e){
                            echo(1);
                            continue;
                        }
                        if($numberStudent>=30)  break;
                    }
                }
            }else if($val ===2){
                $numberStudent=0;
                foreach($student_soft_2 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_soft[$group_soft_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_soft_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                            if($numberStudent>=30)  break;
                        }catch(ErrorException $e){
                            continue;
                        }
                    }
                }
            }else{
                $numberStudent=0;
                foreach($student_soft_3 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_soft[$group_soft_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_soft_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                            if($numberStudent>=30)  break;
                        }catch(ErrorException $e){
                            continue;
                        }
                    }
                }
            }
        }

        foreach($group_design_degree as $key => $val){
            //lấy từng khóa ra
            if($val ===1){
                $numberStudent=0;
                foreach($student_design_1 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_design[$group_design_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_design_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                            if($numberStudent>=30)  break;
                        }catch(ErrorException $e){
                            continue;
                        }
                    }
                }
            }else if($val ===2){
                $numberStudent=0;
                foreach($student_design_2 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_design[$group_design_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_design_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                            if($numberStudent>=30)  break;
                        }catch(ErrorException $e){
                            continue;
                        }
                    }
                }
            }else{
                $numberStudent=0;
                foreach($student_design_3 as $k => $v){ //key : id, value: semester
                    if($v === $semster_subject_design[$group_design_subject[$key]]){ //
                        $numberStudent++;
                        $data=[
                            'group_id'=>$key,
                            'subject_id'=>$group_design_subject[$key],
                            'student_id'=>$k,
                        ];
                        try{
                            StudentGroup::create($data);
                            if($numberStudent>=30)  break;
                        }catch(ErrorException $e){
                            continue;
                        }
                    }
                }
            }
        }

    }
}
