<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Major_Subject;
use App\Models\MajorSubject;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Seeder;

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

//        foreach($student_soft_1 as $k => $value){
//            echo ($k .":". $value ."\n" );
//        }
//        echo("degree");
//        foreach($group_soft_degree as $key => $value){
//            if($value===1) {
//                echo($key.": ".$value."\n");
//            }
//        }
        foreach($group_soft_degree as $key => $val){
//            echo("\n sau khi xoa\n");
//            foreach($student_soft_1 as $k => $value){
//                echo ($k .":". $value ."\n" );
//            }
//            echo("=============================\n");
            $arr_student_added=array();
            $arrStudent = array();
            //lấy từng khóa ra
            if($val ===1){
                $subject_group = Group::where('id',$key)
                                ->pluck('subject_id')
                                ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                                            ->where('major_id',1)
                                            ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_soft_1,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
//                echo("arr added");
//                foreach($arr_student_added as $k => $value){
//                    echo($k . ":" . $value . "\n");
//                }
//                echo("arr added");

                //$student_soft_1 = array();
                $student_soft_1 = $this->DeleteElement($student_soft_1,$arr_student_added);


//                $student_soft_1=\array_diff_key($student_soft_1,$arr_student_added);


//                echo("===================" . PHP_EOL);
            }
            else if($val ===2){
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                    ->where('major_id',1)
                    ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_soft_2,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
                $student_soft_2 = $this->DeleteElement($student_soft_2,$arr_student_added);
            }
            else{
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                    ->where('major_id',1)
                    ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_soft_3,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
                $student_soft_3 = $this->DeleteElement($student_soft_3,$arr_student_added);

            }
        }

        foreach($group_design_degree as $key => $val){
            //lấy từng khóa ra
            $arr_student_added=array();
            $arrStudent = array();
            if($val ===1){
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                    ->where('major_id',2)
                    ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_design_1,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
                $student_design_1 = $this->DeleteElement($student_design_1,$arr_student_added);
            }
            else if($val ===2){
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                    ->where('major_id',2)
                    ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_design_2,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
                $student_design_2 = $this->DeleteElement($student_design_2,$arr_student_added);
            }else{
                $subject_group = Group::where('id',$key)
                    ->pluck('subject_id')
                    ->toArray();
                $semester_major = MajorSubject::where('subject_id',$subject_group[0])
                    ->where('major_id',2)
                    ->first();
                //echo("===========" . $semester_major->semester_major. "==\n");
                $arrStudent = $this->GetStudentBySemester($student_design_3,$semester_major->semester_major);
                //echo(count($arrStudent)."====");
                if(count($arrStudent)===0){
                    continue;
                }
                foreach($subject_group as $subject){
                    $numberStudent=0;
//                    foreach($arrStudent as $k){
//                        echo ($k .'-');
//                    }
//                    echo("===================" . PHP_EOL);
                    foreach($arrStudent as $student) {
                        $data = [
                            'group_id' => $key,
                            'subject_id' => $subject,
                            'student_id' => $student,
                        ];
                        StudentGroup::create($data);
                        $numberStudent++;
                        if (!$this->Exist($arr_student_added, $student)) {
                            $arr_student_added[$student] = $semester_major->semester_major;
//                                array_push($arr_student_added,$student);
                        }
                        if ($numberStudent >= 31 ) {
                            break;
                        }
                    }

                }
                $student_design_3 = $this->DeleteElement($student_design_3,$arr_student_added);
            }

        }

    }

    function GetStudent($arr_Student, $arr_Semester_Subject, $subject) : array
    {
        $arr=array();
        foreach($arr_Student as $k => $v){
//            echo($v . "===" . $arr_Semester_Subject[$subject] . PHP_EOL);
            if($v === $arr_Semester_Subject[$subject]){
                $arr[] = $k;
            }
        }
        return $arr;
    }
    public function GetStudentBySemester($arr_Student, $semester) : array
    {
        //echo("\n======\n");
        $arr=array();
        foreach($arr_Student as $k => $v){
//            echo($v . "===" . $arr_Semester_Subject[$subject] . PHP_EOL);
            if($v === $semester){
                //echo($k . ":" . $v . "\n");
                $arr[] = $k;
            }
        }
        return $arr;
    }

    function Exist($array, $student):bool
    {
        foreach($array as $k => $v){
            if($k === $student){
                return true;
            }
        }
        return false;
    }

    function DeleteElement($arr1, $arr2) : array
    {
        foreach($arr1 as $k => $v){
            foreach($arr2 as $key => $val){
                if($k === $key){
                    unset($arr1[$k]);
                }
            }
        }
        return $arr1;
    }
}
