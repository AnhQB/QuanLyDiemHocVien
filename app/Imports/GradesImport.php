<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GradesImport implements ToArray, WithHeadingRow
{
    private string $originFileName;
    private array $data;

    public function array(array $array):void
    {
        $arr = explode('_', $this->originFileName);
        //example filename: mad20_Spring2022_FE_389283_1
        // or               mad20_Spring2022_FE_389283
        $subject_id = $arr[0];
        $exam_type = ($arr[3] === 'FE' || $arr[3] === 1) ? 1 : 2;
        $semester_year = $arr[1];
        // if last element
        $times_exam = 0;
        if(strlen(end($arr)) <= 1){
            $times_exam =  (end($arr) === '') ? 1 : end($arr) ;
        }else{
            $times_exam = 1;
        }
        foreach ($array as $item){
            $student_id = $item['student_id'];
            $grade = $item['grade'];
            $status = $grade >= 5 ? 1 : 0;

            Grade::query() -> updateOrCreate([
                'student_id' => $student_id,
                'subject_id' => $subject_id,
                'exam_type' => $exam_type,
                'semester_year' => $semester_year,
                'time' => $times_exam,
                'grade' => $grade,
                'status' => $status,
            ]);
        }
        $this->data = $array;
    }

    public function fromFileName(string $originFilename): GradesImport
    {
        $this->originFileName = $originFilename;
        return $this;
    }

    public function getDataImported(): array
    {
        return $this->data;
    }
}
