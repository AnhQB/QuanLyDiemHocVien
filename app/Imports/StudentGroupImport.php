<?php

namespace App\Imports;

use App\Models\Group;
use App\Models\MajorSubject;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentGroupImport implements ToArray, WithHeadingRow
{
    private string $filename;
    private array $data;

    public function array(array $array): void
    {

        $arr = explode('_', $this->filename);
        $degree_id = $arr[0];
        $major_id = $arr[1];
        $group_id = $arr[2];

        $subject_id = $arr[3];
        $major_subject = MajorSubject::query()
                    ->where([
                        ['major_id', $major_id],
                        ['subject_id', $subject_id],
                    ])
                    ->firstOrFail();
        if(!$major_subject){
            throw new \RuntimeException("Môn theo chuyên ngành chưa được khởi tạo");
        }

        if(Group::query()
            ->where([
                ['degree_id', $degree_id],
                ['major_id', $major_id],
                ['id', $group_id],
                ['subject_id', $subject_id],
            ])
            ->doesntExist()
        ){
            throw new \RuntimeException("Lớp không tồn tại với tên file");
        }
        foreach ($array as $each){

            $student_id = $each['id'];
            try {
                Student::query()
                    ->where([
                        ['id', $student_id],
                        ['degree_id', $degree_id],
                        ['major_id', $major_id],
                        ['semester_major', $major_subject->semester_major],
                    ])
                    ->firstOrFail();
            }catch (ModelNotFoundException $e){
                throw new \RuntimeException("học sinh có mã không thuộc chuyên ngành hoặc khoá này");
            }

            StudentGroup::query()
                ->updateOrCreate([
                    'group_id' => $group_id,
                    'subject_id' => $subject_id,
                    'student_id' => $student_id,
                ]);
        }
        $this->data = $array;
    }

    public function fromFileName (string $filename): StudentGroupImport
    {
        $this->filename = $filename;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
