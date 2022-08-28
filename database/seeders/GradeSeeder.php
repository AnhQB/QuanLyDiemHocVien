<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::query()
                ->pluck('exam_type','id')
                ->toArray();
        $students = Student::query()
                ->pluck('degree_id','id')
                ->toArray();

        foreach($students as $k => $v){
            $subjects_student = StudentGroup::where('student_id',$k)
                                ->pluck('subject_id')
                                ->toArray();

            foreach($subjects_student as $subject){
                $exam_type = $this->FindExamType($subject, $subjects);
                $data = [
                    'student_id' => $k,
                    'subject_id' => $subject,
                    'exam_type' => $exam_type,
                    'semester_year' => 'Spring2022',
                    'time' => 1,
                    'grade' => random_int(50,100)/10,
                    'slot' => random_int(1,6),
                ];
                Grade::create($data);
            }
        }
    }

    function FindExamType($subject, $subjects): string
    {
        $result ="";
        foreach($subjects as $k => $v){
            if($k === $subject){
                $result = $v;
            }
        }
        return $result;
    }
}
