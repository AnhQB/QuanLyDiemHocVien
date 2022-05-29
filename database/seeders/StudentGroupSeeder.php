<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\MajorSubject;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Boolean;
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
        $group_design_degree = Group::where('major_id','2')
                        ->pluck('degree_id','id')
                        ->toArray();
        $semster_subject_soft = MajorSubject::where('major_id','1')
                        ->pluck('semester_major','subject_id')
                        ->toArray();
        $semster_subject_design = MajorSubject::where('major_id','2')
                        ->pluck('semester_major','subject_id')
                        ->toArray();

        foreach($group_soft_degree as $key => $val){
            $arr_student_added=array();
            $subject_group=array();
            //lấy từng khóa ra
            if($val ===1){
                $subject_group = Group::where('id',$key)
                                ->pluck('subject_id')
                                ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_soft_1, $semster_subject_soft, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_soft_1=[];
                $student_soft_1=array_values($this->DeleteElement($student_soft_1,$arr_student_added));
//                foreach($arr_student_added as $k){
//                    echo ($k .'-');
//                }
//                echo("===================" . PHP_EOL);
            }else if($val ===2){

                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_soft_2, $semster_subject_soft, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_soft_2=[];
                $student_soft_2=array_values($this->DeleteElement($student_soft_2,$arr_student_added));
            }else{
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_soft_3, $semster_subject_soft, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_soft_3=[];
                $student_soft_3=array_values($this->DeleteElement($student_soft_3,$arr_student_added));
            }
        }

        foreach($group_design_degree as $key => $val){
            //lấy từng khóa ra
            $arr_student_added=array();
            $subject_group=array();
            if($val ===1){
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_design_1, $semster_subject_design, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_design_1=[];
                $student_design_1=array_values($this->DeleteElement($student_design_1,$arr_student_added));
            }else if($val ===2){
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_design_1, $semster_subject_design, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_design_2=[];
                $student_design_2 =array_values($this->DeleteElement($student_design_2,$arr_student_added));
            }else{
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                foreach($subject_group as $subject){
                    $numberStudent=0;
                    $arrStudent = $this->GetStudent($student_design_3, $semster_subject_design, $subject);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[] = $student;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 30) {
                            break;
                        }

                    }
                }
//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);
                $student_design_3=[];
                $student_design_3=array_values($this->DeleteElement($student_design_3,$arr_student_added));
            }
        }

    }

    function GetStudent($arr_Student, $arr_Semester_Subject, $subject) : array
    {
        $arr=array();
        foreach($arr_Student as $k => $v){
            if($v === $arr_Semester_Subject[$subject]){
                $arr[] = $k;
            }
        }
        return $arr;
    }

    function Exist($array, $student):bool
    {
        foreach($array as $a){
            if($a === $student){
                return true;
            }
        }
        return false;
    }

    function DeleteElement($arr1, $arr2) : array
    {
        $arr=[];
        foreach($arr1 as $k => $v){
            foreach($arr2 as $key => $val){
                if($v === $val){
                    unset($arr1[$k]);
                    $arr = array_values($arr1);
                }
            }
        }
        return $arr;
    }
}
